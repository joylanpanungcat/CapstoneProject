const staticCacheName = 'site-static-v4';
const dynamicCacheName = 'site-dynamic-v2';
const assets = [
    '/',
    'js/app.js',
    'images/logo.png',
    'css/css/font-awesome.min.css',
    'css/custom.min.css',
    'js/bootstrap/bootstrap.bundle.min.js',
    'images/no_internet.png',
    'js/jquery/jquery.min.js',
    'manifest.json',
    '/fallback',
    '/return_fallback',
   

];

const limitCacheSize = (name , size) => {
    caches.open(name).then(cache => {
        cache.keys().then(keys => {
            if(keys.length > size){
                cache.delete(keys[0]).then(limitCacheSize(name,size));
            }
        })
    })
}

self.addEventListener('install', evt=>{
    // console.log('service worker has been installed');
    evt.waitUntil(
        caches.open(staticCacheName).then(cache => {
            console.log('caching shell assets');
            cache.addAll(assets);
        })
    );
});

self.addEventListener('active', evt =>{
    console.log('service worker has been activated');
    evt.waitUntil(
        caches.keys().then(keys =>{
            return Promise.all(keys 
                .filter(key => key !== staticCacheName && key !== dynamicCacheName)
                .map(key => caches.delete(key))
                )
        })
    )
});

self.addEventListener('fetch',evt =>{
   evt.respondWith(
       caches.match(evt.request).then(cacheRes => {
           return cacheRes || fetch(evt.request).then(fetchRes => {
               return caches.open(dynamicCacheName).then(cache => {
                   cache.put(evt.request.url,fetchRes.clone());
                   limitCacheSize(dynamicCacheName, 40);
                   return fetchRes;
               })
           }).catch(() => caches.match('fallback'))
       })
   )
});