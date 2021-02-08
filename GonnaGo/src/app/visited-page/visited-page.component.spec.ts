import { ComponentFixture, TestBed } from '@angular/core/testing';

import { VisitedPageComponent } from './visited-page.component';

describe('VisitedPageComponent', () => {
  let component: VisitedPageComponent;
  let fixture: ComponentFixture<VisitedPageComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ VisitedPageComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(VisitedPageComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
