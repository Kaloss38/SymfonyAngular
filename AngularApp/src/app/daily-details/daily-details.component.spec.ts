import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { DailyDetailsComponent } from './daily-details.component';

describe('DailyDetailsComponent', () => {
  let component: DailyDetailsComponent;
  let fixture: ComponentFixture<DailyDetailsComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ DailyDetailsComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(DailyDetailsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should be created', () => {
    expect(component).toBeTruthy();
  });
});
