import { Component, OnInit, Input } from '@angular/core';

@Component({
  selector: 'app-card',
  templateUrl: './card.component.html',
  styleUrls: ['./card.component.css']
})
export class CardComponent implements OnInit {

  @Input() descripcion: string;
  @Input() imagen: string;
  constructor() { }

  ngOnInit(): void {
  }

}
