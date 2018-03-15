<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Books;
use App\File;
use App\prof;
use App\proffile;
use App\journal;
use App\journalfile;
use App\news;

class CreateController extends Controller
{
	public function books() {
		$books = Books::all();
		return view('books', ['books' => $books]);
	}
	public function add(Request $request) {
		$this->validate($request, [
			'book_id' => 'required',
			'name' => 'required',
			'author' => 'required',
			'availability' => 'required'
		]);

		$book = new Books;
		$book->book_id = $request->input('book_id');
		$book->name = $request->input('name');
		$book->author = $request->input('author');
		$book->availability = $request->input('availability');
		$book->description = $request->input('description');
		if($request->hasFile('file')) {
			$filename = $request->file->getClientOriginalName();
			$filesize = $request->file->getClientSize();
			$request->file->storeAs('public/images',$filename);
			$file = new File;
			$file->name = $filename;
			$file->size = $filesize;
			$file->save();
		} else {
			$file = new File;
			$file->name = '';
			$file->size = '';
			$file->save();
		}
		$book->save();
		return redirect('/books')->with('info', 'Article Saved Successfully!');
	}
	public function read($id) {
		$book = Books::find($id);
		$file = File::find($id);
		return view('bookinfo', [
			'book' => $book,
			'file' => $file
		]);
	}
	public function newcopy(Request $request) {
		$this->validate($request, [
			'book_id' => 'required',
			'availability' => 'required'
		]);

		$book = Books::where('book_id',$request->input('book_id'))->increment('availability',$request->input('availability'));
		return redirect('/books')->with('info', 'Article Saved Successfully!');
	}
	public function search(Request $request) {
		$keyword = $request->input('search');
		$books = Books::where(function ($query) use ($keyword) {
			$query->where('book_id', 'LIKE', '%'.$keyword.'%')
					->orWhere('name', 'LIKE', '%'.$keyword.'%')
					->orWhere('author', 'LIKE', '%'.$keyword.'%');
		})->get();
		// $books = Books::where('name', 'LIKE', '%'.$keyword.'%', 'OR', 'author', 'LIKE', '%'.$keyword.'%', 'OR', 'book_id', 'LIKE', '%'.$keyword.'%')->get();
		return view('books', ['books' => $books]);
	}
	public function prof() {
		$books = prof::all();
		return view('prof', ['books' => $books]);
	}
	public function profread($id) {
		$book = prof::find($id);
		$file = proffile::find($id);
		return view('profbookinfo', [
			'book' => $book,
			'file' => $file
		]);
	}
	public function addprof(Request $request) {
		$this->validate($request, [
			'name' => 'required',
			'author' => 'required',
			'prof' => 'required',
		]);

		$book = new prof;
		$book->name = $request->input('name');
		$book->author = $request->input('author');
		$book->prof = $request->input('prof');
		$book->description = $request->input('description');
		if($request->hasFile('file')) {
			$filename = $request->file->getClientOriginalName();
			$filesize = $request->file->getClientSize();
			$request->file->storeAs('public/images',$filename);
			$file = new proffile;
			$file->name = $filename;
			$file->size = $filesize;
			$file->save();
		} else {
			$file = new proffile;
			$file->name = '';
			$file->size = '';
			$file->save();
		}
		$book->save();
		return redirect('/professor-possessions')->with('info', 'Article Saved Successfully!');
	}
	public function profsearch(Request $request) {
		$keyword = $request->input('search');
		$books = prof::where(function ($query) use ($keyword) {
			$query->where('name', 'LIKE', '%'.$keyword.'%')
					->orWhere('author', 'LIKE', '%'.$keyword.'%')
					->orWhere('prof', 'LIKE', '%'.$keyword.'%');
		})->get();
		// $books = Books::where('name', 'LIKE', '%'.$keyword.'%', 'OR', 'author', 'LIKE', '%'.$keyword.'%', 'OR', 'book_id', 'LIKE', '%'.$keyword.'%')->get();
		return view('prof', ['books' => $books]);
	}
	public function journals() {
		$books = journal::all();
		return view('journals', ['books' => $books]);
	}
	public function journalread($id) {
		$book = journal::find($id);
		$file = journalfile::find($id);
		return view('journalinfo', [
			'book' => $book,
			'file' => $file
		]);
	}
	public function addjournal(Request $request) {
		$this->validate($request, [
			'name' => 'required',
			'place' => 'required'
		]);

		$book = new journal;
		$book->name = $request->input('name');
		$book->place = $request->input('place');
		$book->description = $request->input('description');
		if($request->hasFile('file')) {
			$filename = $request->file->getClientOriginalName();
			$filesize = $request->file->getClientSize();
			$request->file->storeAs('public/images',$filename);
			$file = new journalfile;
			$file->name = $filename;
			$file->size = $filesize;
			$file->save();
		} else {
			$file = new journalfile;
			$file->name = '';
			$file->size = '';
			$file->save();
		}
		$book->save();
		return redirect('/journals')->with('info', 'Article Saved Successfully!');
	}
	public function journalsearch(Request $request) {
		$keyword = $request->input('search');
		$books = journal::where(function ($query) use ($keyword) {
			$query->where('name', 'LIKE', '%'.$keyword.'%')
					->orWhere('place', 'LIKE', '%'.$keyword.'%');
		})->get();
		// $books = Books::where('name', 'LIKE', '%'.$keyword.'%', 'OR', 'author', 'LIKE', '%'.$keyword.'%', 'OR', 'book_id', 'LIKE', '%'.$keyword.'%')->get();
		return view('journals', ['books' => $books]);
	}
	public function news() {
		$books = news::orderBy('id','DESC')->paginate(10);
		return view('news', ['books' => $books]);
	}
	public function addnews(Request $request) {
		$this->validate($request, [
			'name' => 'required',
			'author' => 'required',
			'subject' => 'required',
			'description' => 'required'
		]);

		$book = new news;
		$book->name = $request->input('name');
		$book->author = $request->input('author');
		$book->subject = $request->input('subject');
		$book->description = $request->input('description');
		$book->save();
		return redirect('/news')->with('info', 'Article Saved Successfully!');
	}
	public function newsread($id) {
		$book = news::find($id);
		return view('newsinfo', [
			'book' => $book
		]);
	}
	public function newssearch(Request $request) {
		$keyword = $request->input('search');
		$books = news::where(function ($query) use ($keyword) {
			$query->where('name', 'LIKE', '%'.$keyword.'%')
					->orWhere('author', 'LIKE', '%'.$keyword.'%')
					->orWhere('subject', 'LIKE', '%'.$keyword.'%');
		})->paginate(10);
		return view('news', ['books' => $books]);
	}
}
