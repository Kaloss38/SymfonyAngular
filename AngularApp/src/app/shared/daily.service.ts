import { Injectable } from '@angular/core';
import { Http } from '@angular/http';
import 'rxjs/add/operator/map';

@Injectable()
export class DailyService {

    constructor(public http: Http) { }

    getProjects(){
        return this.http.get('http://localhost:8000/api/allProject')
            .map(res => res.json());
    }

    getDetails(id){
        return this.http.get('http://localhost:8000/api/project/' + id)
            .map(res => res.json());
    }

    getCurrentUser(){
        return this.http.get('http://localhost:8000/api/user')
            .map(res => res.json());
    }
}
