//private key: af0cdfdfa555ce1a194f9011b6a49078ac52ebdf
//public key: 6a6c73f102254216403292f530e1986e
//http://gateway.marvel.com/v1/public/comics?ts=patata&apikey=6a6c73f102254216403292f530e1986e&hash=c919203fbd650a3f0dc19c356004c884

import {Router, NavigationEnd} from '@angular/router';
import {Component, OnInit} from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'Tour of Heroes';

  currentRoute!: string;

  constructor(private router: Router) {
    router.events.subscribe(event => {
      if (event instanceof NavigationEnd) {
        this.currentRoute = event.url;
      }
    });
  }

  showElement(): boolean {
    return this.currentRoute == '/heroes';
  }
}
