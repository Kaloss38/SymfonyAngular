import { Component, OnInit } from '@angular/core';
import { DailyService } from '../shared/daily.service';
import { ActivatedRoute } from '@angular/router';
import { BtnDelNoteComponent } from '../btn-del-note/btn-del-note.component';


@Component({
  selector: 'app-daily-details',
  templateUrl: './daily-details.component.html',
  styleUrls: ['./daily-details.component.css']
})

export class DailyDetailsComponent implements OnInit {
  sub: any;
  id: number;
  details:any;

  constructor(private route: ActivatedRoute, public dailyservice: DailyService) { }


  ngOnInit() {
    this.sub = this.route.params.subscribe(params => {  
      this.id = +params['id']; // pour surveiller l'url et connaitre l'id 
    });

    this.dailyservice.getDetails(this.id).subscribe((params) => this.details = params); // pour avoir l'id recupéré ajouté à grace à notre service
  }

}
