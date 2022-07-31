<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class folderUpload extends Model
{
    use HasFactory;
      public $table ='folder_upload';
    protected $primaryKey ='folderId';
    public $timestamps=false;

        public function application(){
        return $this->belongsTo(application::class,'applicantId','applicantId');
    }
    public function fileUpload(){
        return $this->hasMany(fileUpload::class,'folderId','folderId');
    }
     public function activity(){
        return $this->hasMany(activity::class,'folderId','folderId');
    }


    public function parent(){
        return  $this->belongsTo(folderUpload::class,'parentId')->with('parent');

    }


    public function children(){
        return $this->hasMany(folderUpload::class,'parentId')->with('children');
    }


  public static function tree($folderId,$applicationId){
    $allFolder=folderUpload::all();
    $rootFolder=$allFolder
    ->where('applicationId',$applicationId)
    ->where('folderId',$folderId)->values();
    $path2='';
  self::formatTree($rootFolder,$allFolder);
$rootFolder->toArray();


$path= self::parseTree($rootFolder);
  $path=  collect($path)->flatten()->toArray();

     for($i=(count($path)-1);$i>=0;$i--){
        $path2.=$path[$i].'/';
    }
    return $path2;

 }

  public static function parseTree($tree) {
        $return = null;
        // Traverse the tree and search for children of current parent
      foreach ($tree as $key=> $item){
      // A child is found

            if ($item["parent"]!=null){
                // append child into array of children & recurse for children of children
                $return["folderName"]=$item["folderName"];
              $return[]= self::parseTree($item["parent"]);
                    // delete child so won't include again
                unset ($tree[$key]);
            }
            // elseif ($root == null) {
            //     // top level parent - add to array
            //     $return[$item['folderName']] = self::parseTree($tree, $item['folderName']);
            //     // delete child so won't include again
            //     unset ($tree[$key]);
            // }
        }
        return $return;
    }

  private static function formatTree($folders, $allFolder ){


    foreach($folders as $folder){


        $folder["parent"] = $allFolder->where('folderId',$folder['parentId'])->values();


        if(!empty($folder["parent"])){
        self::formatTree($folder["parent"], $allFolder);

        }

    }

  }

 public static function treeChildren($folderId,$applicationId){
    $allFolder=folderUpload::all();
    $rootFolder=$allFolder
    ->where('applicationId',$applicationId)
    ->where('folderId',$folderId)->values();
    $path2='';
   self::formatTreeChildren($rootFolder,$allFolder);
$rootFolder->toArray();


    return $rootFolder;

 }


    private static function formatTreeChildren($folders, $allFolder ){


    foreach($folders as $folder){

        $folder->children= $allFolder->where('parentId',$folder['folderId'])->values();

        if($folder->children->isNotEmpty()){
        self::formatTreeChildren($folder['children'], $allFolder);

        }

    }

  }

  // public static function text(){
  //   $array=[
  //       'firstname'=>'joylan',
  //       'lastname'=>'Panungcat',
  //       'parent'=>[
  //           'firstname'=>'josephine',
  //           'lastname'=>'Panungcat',
  //           'parent'=>[
  //           'firstname'=>'Pudol',
  //           'lastname'=>'jumilla',

  //            ]

  //       ]

  //   ];

  //   return collect($array)->toArray();
  // }





}
