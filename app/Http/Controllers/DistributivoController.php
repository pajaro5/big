<?php

namespace Big\Http\Controllers;

use Big\Distributivo;
use Illuminate\Http\Request;

class DistributivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd('hola');
        return view('distributivo.home');
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \Big\Distributivo  $distributivo
     * @return \Illuminate\Http\Response
     */
    public function show(Distributivo $distributivo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Big\Distributivo  $distributivo
     * @return \Illuminate\Http\Response
     */
    public function edit(Distributivo $distributivo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Big\Distributivo  $distributivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Distributivo $distributivo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Big\Distributivo  $distributivo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Distributivo $distributivo)
    {
        //
    }
}
