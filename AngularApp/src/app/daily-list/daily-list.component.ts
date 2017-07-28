import { Component, OnInit } from '@angular/core';
import { DailyService } from '../shared/daily.service';

@Component({
  selector: 'app-daily-list',
  templateUrl: './daily-list.component.html',
  styleUrls: ['./daily-list.component.css']
})
export class DailyListComponent implements OnInit {
  projects:any[];

  constructor(public dailyservice: DailyService) { }

  ngOnInit() {

    this.dailyservice.getProjects().subscribe((data) => this.projects = data);
    
  }

}
