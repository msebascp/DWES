import { Component, OnInit } from '@angular/core';
import {MarvelService} from "../marvel/marvel.service";
import {Character} from "../marvel/character";

@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html',
  styleUrls: [ './dashboard.component.css' ]
})
export class DashboardComponent implements OnInit {
  heroes: Character[] = [];
  offset: number = Math.floor(Math.random() * 1542);
  total: number = 0;
  constructor(private marvelService: MarvelService) { }

  ngOnInit(): void {
    this.getHeroes(this.offset);
    console.log(this.offset);
  }

  getHeroes(offset: number): void {
    this.marvelService.getHeroesOffset(offset, 10)
      .subscribe((heroes => {
        this.heroes = heroes.data.results;
      }))
  }
}
