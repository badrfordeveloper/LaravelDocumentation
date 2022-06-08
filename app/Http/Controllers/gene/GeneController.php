<?php

namespace App\Http\Controllers\gene;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;

class GeneController extends Controller
{
    //
    public function index()
    {
       /* $types=Config::get('constants.types'); */
        $types=['text','select','integer','boolean'];
        $options="";
        foreach ($types as $type) {
            $options.='<option value="'.$type.'">'.$type.'</option>';
        }
        return view('gene',compact('options'));
    }

    public function delete()
    {
        // route
        $contentWeb=Storage::disk('route')->get('web.php');
        $contentWeb=Str::replaceLast("Route::resource('gene',GeneController::class);",'', $contentWeb);
        $contentWeb=Str::replaceLast("Route::get('geneDelete',[GeneController::class,'delete']);",'', $contentWeb);
        $contentWeb=Str::replaceLast("use App\Http\Controllers\gene\GeneController;",'', $contentWeb);
        Storage::disk('route')->put('web.php', $contentWeb);
        // view
        Storage::disk('resources')->delete('views/gene.blade.php');
        // controller
        Storage::disk('Http')->deleteDirectory('Controllers/gene');
    }

    public function store(Request $request)
    {
        $columns=array();
        $filterkeysText=array();
        $filterkeysSelect=array();
        $ArrayRules=array();
        foreach ($request->columns as $column) {
            $column=(object)$column;
            $columns[]=$column->column;
            $ArrayRules[]="'".$column->column."' => 'required'";
            if(isset($column->filter)){
                if($column->type=="select"){
                    $filterkeysSelect[]=$column->column;
                }
                else{
                    $filterkeysText[]=$column->column;
                }
            }
        }

        $FullColumns=$request->columns;

        $rules=implode(",\r\n\t\t\t", $ArrayRules);


        $keysText="'".implode("','", $filterkeysText)."'";
        $keysSelect="'".implode("','", $filterkeysSelect)."'";

        $model=ucfirst($request->table);
        $littleModel=$request->table;
        $parent=$request->parent;
        $plural = Str::plural($littleModel);

        $this->makeRoute($model,$plural,$parent);
         $this->makeNavigation($plural);
         $this->makeMigration($model,$littleModel,$FullColumns);
         $this->makeModel($model,$columns);
         $this->makeController($plural,$parent,$model,$littleModel,$keysText,$keysSelect);

        $this->makeIndex($plural,$littleModel,$parent);
         $this->makeCreate($plural,$model,$parent);
         $this->makeForm($plural,$littleModel,$parent,$FullColumns);
         $this->makeEdit($plural,$littleModel,$parent,$model);
         $this->makeRequest($model,$parent,$rules);
         $this->makeShow($plural,$littleModel,$parent,$model,$FullColumns);

        // $this->makePermissionSeeder($littleModel);
        // $this->makeTable($littleModel,$parent,$FullColumns);
        // $this->makeRepository($model,$parent);
        // $this->makeRepositoryInterface($model,$parent);
        dd($request->all());
        // return view('gene');
    }

    public function makeShow($plural,$littleModel,$parent,$model,$FullColumns){

        $content=Storage::disk('gene')->get('templates/views/show.php');
        //deal with parent
        $content=$this->parentContent($parent,$content);
        $nameOfFile=$this->parentNameFileViews($parent,'admin/'.$plural,'views','show.blade.php');
        $content=Str::replace('%littleModel%', $littleModel, $content);
        $content=Str::replace('%Model%', $model, $content);
        $content=Str::replace('%plural%', $plural, $content);



        $labels='';
        foreach ($FullColumns as $column) {
            $column=(object)$column;
                $contentText=Storage::disk('gene')->get('templates/views/labels-show.php');
                $contentText=Str::replace('%littleModel%', $littleModel, $contentText);
                $contentText=Str::replace('%column%', $column->column, $contentText);
                $labels.=$contentText;

        }
        $content=Str::replace('%labels%', $labels, $content);

        Storage::disk('resources')->put($nameOfFile, $content);
    }

    public function makeRequest($model,$parent,$rules){

        $content=Storage::disk('gene')->get('templates/Request.php');
        //deal with parent
        $content=$this->parentContent($parent,$content);
        $nameOfRequest=$this->parentNameFile($parent,$model,'Requests','Request.php');

        $content=Str::replace('%Model%', $model, $content);
        $content=Str::replace('%rules%', $rules, $content);

        Storage::disk('Http')->put($nameOfRequest, $content);
    }

    public function makeEdit($plural,$littleModel,$parent,$model){

        $content=Storage::disk('gene')->get('templates/views/edit.php');
        //deal with parent
        $content=$this->parentContent($parent,$content);
        $nameOfFile=$this->parentNameFileViews($parent,'admin/'.$plural,'views','edit.blade.php');
        $content=Str::replace('%littleModel%', $littleModel, $content);
        $content=Str::replace('%Model%', $model, $content);
        $content=Str::replace('%plural%', $plural, $content);

        Storage::disk('resources')->put($nameOfFile, $content);
    }
    public function makeForm($plural,$littleModel,$parent,$FullColumns){

        $content=Storage::disk('gene')->get('templates/views/form.php');
        //deal with parent
        $content=$this->parentContent($parent,$content);
        $nameOfFile=$this->parentNameFileViews($parent,'admin/'.$plural,'views','form.blade.php');
        $inputs='';
        foreach ($FullColumns as $column) {
            $column=(object)$column;
            if($column->type=="text"){
                $contentText=Storage::disk('gene')->get('templates/views/fields/text.php');
                $contentText=Str::replace('%littleModel%', $littleModel, $contentText);
                $contentText=Str::replace('%column%', $column->column, $contentText);
                $inputs.=$contentText;
            }
            else if($column->type=="select"){

                $contentSelect=Storage::disk('gene')->get('templates/views/fields/select.php');
                $contentSelect=Str::replace('%littleModel%', $littleModel, $contentSelect);
                $contentSelect=Str::replace('%column%', $column->column, $contentSelect);

                if(Str::contains($column->column, '_id')){
                    $itemOfSelect=Str::replace('_id','',$column->column);
                    $contentSelect=Str::replace('%itemOfSelect%', $itemOfSelect, $contentSelect);
                }else{
                    $contentSelect=Str::replace('%itemOfSelect%', $column->column, $contentSelect);
                }

                $inputs.=$contentSelect;
            }
        }

        $content=Str::replace('%inputs%', $inputs, $content);

        Storage::disk('resources')->put($nameOfFile, $content);
    }
    public function makeCreate($plural,$model,$parent){
        $content=Storage::disk('gene')->get('templates/views/create.php');
        //deal with parent
        $content=$this->parentContent($parent,$content);
        $nameOfFile=$this->parentNameFileViews($parent,'admin/'.$plural,'views','create.blade.php');
        $content=Str::replace('%Model%', $model, $content);
        $content=Str::replace('%plural%', $plural, $content);
        Storage::disk('resources')->put($nameOfFile, $content);
    }
    public function makeIndex($plural,$littleModel,$parent){
        $content=Storage::disk('gene')->get('templates/views/index.php');
        //deal with parent
        $content=$this->parentContent($parent,$content);
        $content=Str::replace('%plural%', $plural, $content);
        $nameOfFile=$this->parentNameFileViews($parent,'admin/'.$plural,'views','index.blade.php');
        Storage::disk('resources')->put($nameOfFile, $content);
    }
    public function makeTable($littleModel,$parent,$FullColumns){

        $content=Storage::disk('gene')->get('templates/views/table.php');
        //deal with parent
        $content=$this->parentContent($parent,$content);
        $content=Str::replace('%littleModel%', $littleModel, $content);

        $th='';
        $td='';
        foreach ($FullColumns as $column) {
            $column=(object)$column;

            $contentTh=Storage::disk('gene')->get('templates/views/fields/th.php');
            $contentTh=Str::replace('%column%', $column->column, $contentTh);
            $th.=$contentTh;

            $contentTd=Storage::disk('gene')->get('templates/views/fields/td.php');
            $contentTd=Str::replace('%column%', $column->column, $contentTd);
            $td.=$contentTd;

        }

        $content=Str::replace('%th%', $th, $content);
        $content=Str::replace('%td%', $td, $content);
        $nameOfFile=$this->parentNameFileViews($parent,$littleModel,'views','table.blade.php');
        Storage::disk('resources')->put($nameOfFile, $content);
    }
    public function makeController($plural,$parent,$model,$littleModel,$keysText,$keysSelect){
        $contentController=Storage::disk('gene')->get('templates/Controller.php');

        //deal with parent
        $contentController=$this->parentContent($parent,$contentController);
        $nameOfController=$this->parentNameFile($parent,$model,'Controllers/Admin','Controller.php');

        $contentController=Str::replace('%Model%', $model, $contentController);
        $contentController=Str::replace('%littleModel%', $littleModel, $contentController);
        $contentController=Str::replace('%plural%', $plural, $contentController);

        //for filter
        $contentController=Str::replace('%keysText%', $keysText, $contentController);
        $contentController=Str::replace('%keysSelect%', $keysSelect, $contentController);
        Storage::disk('Http')->put($nameOfController, $contentController);
        //End controller

    }
    public function makeModel($model,$columns){
        $content=Storage::disk('gene')->get('templates/Model.php');
        $nameOfModel='Models/'.$model.'.php';

        $columnsModel="'".implode("',\r\n\t\t'", $columns)."'";
        $content=Str::replace('%Model%', $model, $content);
        $content=Str::replace('%columnsModel%', $columnsModel, $content);

        $fieldsInfos='';
        foreach ($columns as $column) {
            $fieldsInfos.="'".$column."' => ".'["name" => "'.$column.'", "orderable" => "true","searchable" => "true"]'.",\r\n\t\t";
        }
        $content=Str::replace('%fieldsInfos%', $fieldsInfos, $content);

        Storage::disk('app')->put($nameOfModel, $content);
    }
    public function makeMigration($model,$littleModel,$FullColumns){

        $content=Storage::disk('gene')->get('templates/migration.php');
        $content=Str::replace('%model%', $model, $content);
        $content=Str::replace('%littleModel%', $littleModel, $content);

        // deal with columns
        $columns='';
        foreach ($FullColumns as $column) {
            $column=(object)$column;
            $contentcolumn=Storage::disk('gene')->get('templates/migrationFields/string.php');
            $contentcolumn=Str::replace('%column%', $column->column, $contentcolumn);
            $columns.=$contentcolumn;
        }
        $content=Str::replace('%columns%', $columns, $content);

        // generate name of migration
        $myDate=now()->toDateTimeString();
        $myDate=Str::replace(' ','_', $myDate);
        $myDate=Str::replace('-','_', $myDate);
        $myDate=Str::replace(':','', $myDate);
        $nameOfFile='migrations/'.$myDate.'_create_'.$littleModel.'s_table.php';
        Storage::disk('database')->put($nameOfFile, $content);
    }
    public function makeNavigation($plural){
        // route
        $content=Storage::disk('gene')->get('templates/navigation.php');
        $content=Str::replace('%plural%', $plural , $content);

        $contentWeb=Storage::disk('resources')->get('views/layouts/admin/components/navigation.blade.php');
        $contentWeb=Str::replaceLast('@endcan', $content, $contentWeb);
        Storage::disk('resources')->put('views/layouts/admin/components/navigation.blade.php', $contentWeb);
    }
    public function makeRoute($model,$plural,$parent){
        // route
        $content=Storage::disk('gene')->get('templates/route.php');
        $content=Str::replace('%plural%', $plural , $content);
        $content=Str::replace('%model%', $model, $content);

        //use route class
        $contentUse=Storage::disk('gene')->get('templates/routeClass.php');
        $contentUse=$this->parentContent($parent,$contentUse);
        $contentUse=Str::replace('%model%', $model, $contentUse);

        $contentWeb=Storage::disk('route')->get('web.php');
        $contentWeb=Str::replaceLast('});', $content, $contentWeb);
        $contentWeb=Str::replaceLast('Controller;', $contentUse, $contentWeb);
        Storage::disk('route')->put('web.php', $contentWeb);
    }
    public function makePermissionSeeder($littleModel){
        // route
        $content=Storage::disk('gene')->get('templates/permissionSeeder.php');
        $content=Str::replace('%littleModel%', $littleModel, $content);

        $contentWeb=Storage::disk('database')->get('seeders/PermissionTableSeeder.php');
        $contentWeb=Str::replaceLast('];', $content, $contentWeb);
        Storage::disk('database')->put('seeders/PermissionTableSeeder.php', $contentWeb);
    }
    public function makeRepositoryInterface($model,$parent){

        $content=Storage::disk('gene')->get('templates/RepositoryInterface.php');
        //deal with parent
        $content=$this->parentContent($parent,$content);
        $nameOfFile=$this->parentNameFileRepository($parent,$model,'Repositories','RepositoryInterface.php');

        $content=Str::replace('%Model%', $model, $content);

        Storage::disk('app')->put($nameOfFile, $content);
    }
    public function makeRepository($model,$parent){

        $content=Storage::disk('gene')->get('templates/Repository.php');
        //deal with parent
        $content=$this->parentContent($parent,$content);
        $nameOfFile=$this->parentNameFileRepository($parent,$model,'Repositories','Repository.php');

        $content=Str::replace('%Model%', $model, $content);

        Storage::disk('app')->put($nameOfFile, $content);
    }


    public function parentContent($parent,$content){
        if(is_null($parent)){
            //remove parent codes parent from content
            $content=Str::replace('%parent%.', '', $content);
            $content=Str::replace('%parent%s', '', $content);
            $content=Str::replace('\\%parent%', '', $content);
            $content=Str::replace('%parent%', '', $content);
        }else{
            $content=Str::replace('%parent%', $parent, $content);
        }
        return $content;
    }

    public function parentNameFileRepository($parent,$model,$folder,$extension){
        if(is_null($parent)){
            $nameOfFile=$folder.'/'.$model.'/'.$model.$extension;

        }else{
            $nameOfFile=$folder.'/'.$parent.'/'.$model.'/'.$model.$extension;
        }
        return $nameOfFile;
    }

    public function parentNameFile($parent,$model,$folder,$extension){
        if(is_null($parent)){
            $nameOfFile=$folder.'/'.$model.$extension;

        }else{
            $nameOfFile=$folder.'/'.$parent.'/'.$model.$extension;
        }
        return $nameOfFile;
    }

    public function parentNameFileViews($parent,$plural,$folder,$extension){
        if(is_null($parent)){
            $nameOfFile=$folder.'/'.$plural.'/'.$extension;

        }else{
            $nameOfFile=$folder.'/'.$parent.'/'.$plural.'/'.$extension;
        }
        return $nameOfFile;
    }
}
