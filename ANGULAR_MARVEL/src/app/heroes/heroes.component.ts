import {Component, OnInit} from '@angular/core';
import {MarvelService} from "../marvel/marvel.service";
import {Character} from "../marvel/character";

@Component({
  selector: 'app-heroes',
  templateUrl: './heroes.component.html',
  styleUrls: ['./heroes.component.css']
})
export class HeroesComponent implements OnInit {
  heroes: Character[] = [];
  offset: number = 0;
  total: number = 0;
  limit: number = 0;

  constructor(private marvelService: MarvelService) {
  }

  ngOnInit(): void {
    this.getHeroesLimit(this.offset);
  }

  nextOffset(): void {
    this.offset += 20;
    this.getHeroesLimit(this.offset);
  }

  previousOffset(): void {
    this.offset -= 20;
    this.getHeroesLimit(this.offset);
  }

  getHeroesLimit(offset: number): void {
    this.marvelService.getHeroesOffset(offset)
      .subscribe((heroes => {
        this.heroes = heroes.data.results;
        this.total = heroes.data.total;
        this.limit = heroes.data.limit;
      }))
  }
}
