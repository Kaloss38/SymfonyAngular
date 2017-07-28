import { Component, OnInit } from '@angular/core';
import { DailyService } from '../shared/daily.service';

@Component({
  selector: 'app-btn-del-note',
  templateUrl: './btn-del-note.component.html',
  styleUrls: ['./btn-del-note.component.css']
})
export class BtnDelNoteComponent implements OnInit {
  show: boolean = true;
  idCurrent : number;

  constructor(public dailyservice: DailyService) { 

  }

  ngOnInit() {

    this.dailyservice.getCurrentUser().subscribe((params) => { 
      this.idCurrent = params.name;
   // console.log(this.idCurrent);

    }); 


  }

}
