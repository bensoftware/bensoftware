<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;

use DataTables;
use App\User;
use App;
//use Auth;

class ArticleController extends Controller
{
    private $module = 'articles';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view($this->module.'.index');
    }

    public function getDT($selected='all')
    {
        $articles = Article::all();
        if ($selected != 'all')
            $articles = Article::orderByRaw('id = ? desc', [$selected]);
        return DataTables::of($articles)
            ->addColumn('actions', function(Article $article) {
                $html = '<div class="btn-group">';
                $html .=' <button type="button" class="btn btn-sm btn-dark" onClick="openObjectModal('.$article->id.',\''.$this->module.'\')" data-toggle="tooltip" data-placement="top" title="'.trans('text.visualiser').'"><i class="fa fa-fw fa-eye"></i></button> ';
                $html .=' <button type="button" class="btn btn-sm btn-secondary" onClick="confirmAction(\''.url($this->module.'/delete/'.$article->id).'\',\''.trans('text.confirm_suppression').'\')" data-toggle="tooltip" data-placement="top" title="'.trans('text.supprimer').'"><i class="fas fa-trash"></i></button> ';
                $html .='</div>';
                return $html;
            })
            ->setRowClass(function ($article) use ($selected) {
                return $article->id == $selected ? 'alert-success' : '';
            })
            ->rawColumns(['id','actions'])
            ->make(true);
    }

    public function formAdd()
    {
        return view($this->module.'.add');
    }

    public function add(ArticleRequest $request)
    {
        $article = new Article;
        $article->libelle = $request->libelle;
        $article->save();
        return response()->json($article->id,200);
    }

    public function edit(ArticleRequest $request)
    {
        $article = Article::find($request->id);
        $article->libelle = $request->libelle;
        $article->save();
        return response()->json('Done',200);
    }

    public function get($id)
    {
        $article = Article::find($id);
        $tablink = $this->module.'/getTab/'.$id;
        $tabs = [
            '<i class="fa fa-info-circle"></i> '.trans('text.info') => $tablink.'/1',
            '<i class="fa fa-list"></i> '.trans('text.elements') => $tablink.'/2',
            '<i class="fa fa-users"></i> '.trans('text.elements') => $tablink.'/3',
        ];
        $modal_title = '<b>'.$article->libelle.'</b>';
        return view('tabs',['tabs'=>$tabs,'modal_title'=>$modal_title]);
    }

    public function getTab($id,$tab)
    {
        $article = Article::find($id);
        switch ($tab) {
            case '1':
                $parametres = ['article' => $article];
                break;
            default :
                $parametres = ['article' => $article];
                break;
        }
        return view($this->module.'.tabs.tab'.$tab,$parametres);
    }

    public function delete($id)
    {
        $article = Article::find($id);
        if ($article->has_articles)
            return response()->json(['success'=>'false', 'msg'=>trans('text.article_cant_be_del_bcuz_of_articles')],200);
        else {
            $article->delete();
            return response()->json(['success'=>'true', 'msg'=>trans('text.element_well_deleted')],200);
        }
    }
}
