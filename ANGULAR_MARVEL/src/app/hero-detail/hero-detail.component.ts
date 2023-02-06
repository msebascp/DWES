import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { Location } from '@angular/common';
import {Character} from "../marvel/character";
import {MarvelService} from "../marvel/marvel.service";

@Component({
  selector: 'app-hero-detail',
  templateUrl: './hero-detail.component.html',
  styleUrls: [ './hero-detail.component.css' ]
})
export class HeroDetailComponent implements OnInit {
  hero: Character | undefined;

  constructor(
    private route: ActivatedRoute,
    private marvelService: MarvelService,
    private location: Location
  ) {}

  ngOnInit(): void {
    this.getHeroId();
  }

  getHeroId(): void {
    const id = parseInt(this.route.snapshot.paramMap.get('id')!, 10);
    this.marvelService.getHeroId(id)
      .subscribe(data => {
        this.hero = data.data.results[0];
      });
  }

  goBack(): void {
    this.location.back();
  }
}
