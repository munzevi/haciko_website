<?php
namespace App\Http\Controllers\CMS;
use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Helpers\Helpers;
use App\Http\Requests\ContentRequest;
use Illuminate\Http\Request;
use App\Models\Language;
use App\Models\Tag;
use DataTables;
use Illuminate\Support\Arr;

class ContentsController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function index(Request $request){

        $content = Helpers::findContentOrFail();
        if ($request->ajax()) {
            $data = Content::with(['parent', 'author','tags'])
                ->where('type', $content)
                ->withCount('child')->withCount('parent')
                ->get();
            return Datatables::of($data)
                ->addColumn('language', function (Content $content) {
                    return $content->language->name;
                })
                ->addColumn('picture', function (Content $content) {
                    $img = Arr::first($content->banner)['value'];
                    return "<a href='$img' target='_blank' ><img src=\"$img\" style='max-height:100px;'></a>";
                })
                ->addColumn('parent', function (Content $content) {
                    if (isset($content->parent->name)) {
                        return '<button class="btn secondary btn-sm">' . $content->parent->name . '</button>';
                    } else {
                        return null;
                    }
                })
                ->addColumn('tags',function(Content $content){
                    return $content->tags()->get()->map(function($tag){
                        return "<div class='badge badge-pill badge-light text-dark' style='font-size: 14px; font-weight:600;text-transform: capitalize;'><small>{$tag->name}</small></div>";
                    })->implode(' ');
                })
                ->addColumn('child_count', function (Content $content) {
                    return '<button class="btn btn-secondary btn-round btn-icon">' . $content->child_count . '</button>';
                })
                ->addColumn('author', function (Content $content) {
                    return $content->author->name;
                })
                ->addColumn('action', function ($row) {
                    return '<a href="javascript:void(0)"  data-id="' . $row->id . '" data-original-title="Düzenle" class="btn btn-primary btn-sm editContent" style="min-width:110px"><i class="nc-icon nc-settings-gear-65" style="color:white;margin-right:5px;font-weight:600;"></i>' . trans("datatables.actions.edit") . '</a><a href="javascript:void(0)" data-id="' . $row->id . '" data-original-title="Sil" class="btn btn-danger btn-sm deleteContent" style="min-width:110px"><i class="nc-icon nc-simple-remove" style="color:white;margin-right:5px;font-weight:600;"></i>' . trans("datatables.actions.delete") . '</a>';
                })
                ->rawColumns(['action','tags','child_count', 'parent','picture'])->toJson();
        }

        return view('backend.pages.contents')->with(['type' => $content]);
    }


    /**
     * @return Application|Factory|View
     */
    public function create(Request $request) {
        $content=$request->get('content');

        if($content === 'posts'){
            $pages = Content::with('tags')->where('type', 'blog-categories')->get();
        } else {
            $pages = Content::with('tags')->where('type', $content)->get();
        }

        $languages = Language::get();
        $tags = Tag::get();
        return view('backend.pages.content-create')
            ->with(['type'=>$content,'pages' => $pages, 'languages' => $languages,'tags'=>$tags]);
    }


    /**
     * Store a newly created resource in storage.
     * \App\Models\Content
     * @param ContentRequest $request
     * @return Response
     */
    public function store(ContentRequest $request){
        $content = Content::create($request->validated());

        if($request->filled('tags')) $content->tags()->sync($request->tags);

        return redirect()->route('admin.'.$request->type.'.index')->with('success', 'Sayfa Başarıyla kayıt edildi');
    }


    /**
     * neden olduğunu bilmiyorum ama update route'u burada son buluyor
     * TODO: ContentsController@update methodundaki sorunu çöz, show metoduna gidiyor!
     * @param $id
     */
    public function show($id,ContentRequest $request){


        $content = Content::findOrFail($id);
        $content->update($request->validated());
        if($request->filled('tags')) $content->tags()->sync($request->tags);


        return view('backend.pages.contents')->with(['type' => $content->type ])->with('success','işlem başarılı');
    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $c = Content::find($id)->delete();
        dd($c);
//        Content::find($id)->delete();
//        return redirect()->back()->with('success', 'Sayfa başarıyla silinmiştir.');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application
     * \Illuminate\Contracts\View\Factory
     * \Illuminate\View\View
     */
    public function edit($id)
    {
        $content = Content::with('language', 'tags','parent')->findOrFail($id);
        //dd($content->type);
        $languages = Language::all();
        $tags = Tag::all();

        if($content->type === 'posts'){
            $pages = Content::with('tags')->where('type', 'blog-categories')->get();
        } else {
            $pages = Content::with('tags')->where('type', $content->type)->get();
        }

        return view('backend.pages.content-create')
            ->with(['type' => $content->type,'content'=>$content,
                'pages' => $pages, 'languages' => $languages,'tags'=>$tags]);
    }

    /**
     * @mixin \Eloquent
     * @param ContentRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
   public function update(ContentRequest $request){
       dd('update');

       // Content::findOrFail($request->id)->update($request->validated());
       // if($request->filled('tags')){
       //     $content->tags()->sync($request->tags);
       // }

       // return redirect()->route('admin.pages.index')->with('success', 'Sayfa Başarıyla güncellendi ');
   }
}



