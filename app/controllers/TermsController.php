<?php

class TermsController extends BaseController {

    /**
     * Term Repository
     *
     * @var Term
     */
    protected $term;

    public function __construct(Term $term)
    {
        parent::__construct();
        $this->term = $term;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $terms = $this->term->all();

        return View::make('terms.index', compact('terms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('terms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Term::$rules);

        if ($validation->passes())
        {
            $this->term->create($input);

            return Redirect::route('terms.index');
        }

        return Redirect::route('terms.create')
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

    	if (strrpos($slug, "-1") !== false || substr($slug, 0, 4) == 'http') {
			return Redirect::route('home');
        }

        $count = Config::get('videoengine.postcount.term');
        $passive = Config::get('videoengine.passive_mode');
        
        $term = Term::saveOrSelect($slug);
        $videos = ($passive) ? Video::localsearch($term->term, $count) : Video::search($term->term, $count);

        $this->theme->layout('default');
        $this->theme->setTitle(
            Theme::blader($this->config['SEO']['default']['title'], array('title' => $term->term))
		);
        
        $this->theme->setMeta_desc(
            Theme::blader($this->config['SEO']['default']['meta_description'], array('title' => $term->term))
		);
        
        $this->theme->setMeta_keywords(
            Theme::blader($this->config['SEO']['default']['meta_keywords'], array('title' => $term->term))
		);

        $this->theme->bind('videos', $videos);
        $this->theme->bind('page_title', Helpers::convert_title_case($term->term));
        $this->theme->bind('term', $term);

        return $this->theme->scope('home.index')->render();
        // return View::make('terms.show', compact('term'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $term = $this->term->find($id);

        if (is_null($term))
        {
            return Redirect::route('terms.index');
        }

        return View::make('terms.edit', compact('term'));
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
        $validation = Validator::make($input, Term::$rules);

        if ($validation->passes())
        {
            $term = $this->term->find($id);
            $term->update($input);

            return Redirect::route('terms.show', $id);
        }

        return Redirect::route('terms.edit', $id)
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
        $this->term->find($id)->delete();

        return Redirect::route('terms.index');
    }

}