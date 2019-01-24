<?php

namespace App\Http\Controllers\beheer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Faq;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::all();
        $trashedFaqs = Faq::onlyTrashed()
        ->select('*')
        ->get();
        return view('beheer.faq.index', compact('faqs', 'trashedFaqs'));
    }

    public function show($id)
    {
        $faq = Faq::findOrFail($id);


        return view('beheer.faq.edit', compact('faq'));
    }
    public function update(Request $request)
    {
        //return $request;
        $question = $request->question;
        $anwser = $request->anwser;

        $updateFaq = Faq::where('id', '=', $request->id)->update([
            'question' => $question,
            'anwser' => $anwser,
        ]);
        //return $updateFaq;
        if($updateFaq)
        {
            return redirect()->action('beheer\FaqController@index')->with('success', 'FAQ is gewijzigd!');
        }
        
    }

    public function delete($id)
    {
        //return $id;
        $deletedRows = Faq::where('id', $id)->delete();
        return redirect()->action('beheer\FaqController@index')->with('success', 'Vraag is verwijderd!');
    }
    public function restore(Request $request, $id)
    {
        $c  = $request->user()->hasRole('FAQ Restore');
        if ($c ===  true) {
            $restore = Faq::where('id', $id)->restore();
            return redirect()->action('beheer\FaqController@index')->with('status', 'Verwijderen van de vraag is ongedaan gemaakt!');
        } else {
            return redirect()->action('beheer\FaqController@index')->with('status', 'Je hebt geen toegang tot deze functie.');
        }
    }

    public function create(Request $request)
    {
        $test = Faq::create($request->all());
        if($test)
        {
            return redirect()->action('beheer\FaqController@index')->with('success', 'Vraag is toegevoegd aan de website.');
        } else {
            return redirect()->action('beheer\FaqController@index')->with('error', 'De vraag kon nu niet toegevoegd worden. Probeer het later nog eens.');
        }
        
        
    }
}
