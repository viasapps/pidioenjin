<?php

class VideosController extends BaseController {

    /**
     * Video Repository
     *
     * @var Video
     */
    protected $video;

    public function __construct(Video $video)
    {
        parent::__construct();
        $this->video = $video;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $videos = $this->video->all();

        return View::make('videos.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('videos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Video::$rules);

        if ($validation->passes())
        {
            $this->video->create($input);

            return Redirect::route('videos.index');
        }

        return Redirect::route('videos.create')
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($slug)
    {
        $video = Video::where('slug', '=', $slug)->firstOrFail();
        $related_videos = Video::random(Config::get('videoengine.postcount.related'));

        $this->theme->bind('video', $video);
        $this->theme->bind('related_videos', $related_videos);

        $this->theme->layout('single');
        $this->theme->setTitle(
            Theme::blader($this->config['SEO']['single']['title'], array('title' => $video->title))
		);
        $this->theme->setMeta_desc(
            Theme::blader($this->config['SEO']['single']['meta_description'], array('title' => $video->title))
		);
        $this->theme->setMeta_keywords(
            Theme::blader($this->config['SEO']['single']['meta_keywords'], array('title' => $video->title))
		);


        return $this->theme->scope('videos.show')->render();

        // return View::make('videos.show', compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $video = $this->video->find($id);

        if (is_null($video))
        {
            return Redirect::route('videos.index');
        }

        return View::make('videos.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $input = array_except(Input::all(), '_method');
        $validation = Validator::make($input, Video::$rules);

        if ($validation->passes())
        {
            $video = $this->video->find($id);
            $video->update($input);

            return Redirect::route('videos.show', $id);
        }

        return Redirect::route('videos.edit', $id)
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->video->find($id)->delete();

        return Redirect::route('videos.index');
    }

}