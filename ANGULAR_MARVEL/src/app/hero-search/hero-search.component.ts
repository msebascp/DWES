import {Component, OnInit} from '@angular/core';

import {Observable, of, Subject} from 'rxjs';

import {debounceTime, distinctUntilChanged, switchMap} from 'rxjs/operators';

import {Character} from "../marvel/character";
import {MarvelService} from "../marvel/marvel.service";

@Component({
  selector: 'app-hero-search',
  templateUrl: './hero-search.component.html',
  styleUrls: ['./hero-search.component.css']
})
export class HeroSearchComponent implements OnInit {
  heroes$: Observable<Character[]> = of([]);
  searchTerms: Subject<string> = new Subject<string>();

  constructor(private marvelService: MarvelService) {
  }

  ngOnInit(): void {
    this.heroes$ = this.searchTerms.pipe(
      // wait 300ms after each keystroke before considering the term
      debounceTime(300),
      // ignore new term if same as previous term
      distinctUntilChanged(),
      // switch to new search observable each time the term changes
      switchMap(term => {
        console.log(this.marvelService.searchHeroes(term));
        return this.marvelService.searchHeroes(term)
      }));
    console.log(this.heroes$)
  }

  // Push a search term into the observable stream.
  search(term: string): void {
    this.searchTerms.next(term);
  }
}
