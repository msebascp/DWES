import {Injectable} from '@angular/core';
import {ResponseMarvel} from "./responseMarvel";
import {HttpClient, HttpHeaders} from "@angular/common/http";
import {Observable, of} from "rxjs";
import {map} from "rxjs/operators";
import {Character} from "./character";

@Injectable({
  providedIn: 'root'
})
export class MarvelService {
  private marvelUrl = 'http://gateway.marvel.com/v1/public/characters?ts=patata&apikey=6a6c73f102254216403292f530e1986e&hash=c919203fbd650a3f0dc19c356004c884';
  httpOptions = {
    headers: new HttpHeaders({'Content-Type': 'application/json'})
  };

  constructor(
    private http: HttpClient,
  ) {
  }

  searchHeroes(text: string): Observable<Character[]> {
    if (!text.trim()) {
      return of([]);
    }
    console.log('Hago petición con ' + text)
    return this.http.get<ResponseMarvel>(this.marvelUrl + `&nameStartsWith=${text}&limit=4`).pipe(map((data: ResponseMarvel) => {
      console.log(data.data.results);
      return data.data.results;
    }));
  }

  getHeroesOffset(offset: number, limit: number = 20): Observable<ResponseMarvel> {
    return this.http.get<ResponseMarvel>(this.marvelUrl + `&offset=${offset} + &limit=${limit}`)
  }

  getHeroId(id: number): Observable<ResponseMarvel> {
    return this.http.get<ResponseMarvel>(this.marvelUrl + `&id=${id}`)
  }
}
