import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { HttpModule } from '@angular/http';

import { AppComponent } from './app.component';
import { DailyListComponent } from './daily-list/daily-list.component';
import { DailyService } from './shared/daily.service';
import { DailyDetailsComponent } from './daily-details/daily-details.component';
import { MenuComponent } from './menu/menu.component';
import { ChangeColorDirective } from './shared/change-color.directive';
import { UserComponent } from './user/user.component';
import { BtnDelNoteComponent } from './btn-del-note/btn-del-note.component';


const appRoutes: Routes = [
  { path: '', component: MenuComponent },
  { path: 'liste', component: DailyListComponent },
  { path: 'project/:id', component: DailyDetailsComponent },
  { path: 'user', component: UserComponent },
];

@NgModule({
  declarations: [
    AppComponent,
    DailyListComponent,
    DailyDetailsComponent,
    MenuComponent,
    ChangeColorDirective,
    UserComponent,
    BtnDelNoteComponent,
        
  ],
  imports: [
    BrowserModule,
    HttpModule,
    RouterModule.forRoot(
      appRoutes
    )

  ],
  providers: [DailyService],
  bootstrap: [AppComponent]
})



export class AppModule { }
