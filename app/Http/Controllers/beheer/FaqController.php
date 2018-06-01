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
        #return $request;
        $question = $request->faqQuestion;
        $anwser = $request->faqAnwser;

        $updateFaq = Faq::where('id', '=', $request->faqId)->update([
            'question' => $question,
            'anwser' => $anwser,
        ]);
        return redirect()->action('beheer\FaqController@index')->with('status', 'FAQ is gewijzigd!');
    }

    public function delete($id)
    {
        $deletedRows = Faq::where('id', $id)->delete();
        return redirect()->action('beheer\FaqController@index')->with('status', 'Vraag is verwijderd!');
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
}
