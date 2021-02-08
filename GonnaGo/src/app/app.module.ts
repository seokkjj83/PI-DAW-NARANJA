import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> Front-End
import { MainComponent } from './main/main.component';
import { VisitedPageComponent } from './visited-page/visited-page.component';
import { LoginPageComponent } from './login-page/login-page.component';
import { RegisterPageComponent } from './register-page/register-page.component';
import { DetailPageComponent } from './detail-page/detail-page.component';
import { FormPageComponent } from './form-page/form-page.component';
import { MenuComponent } from './menu/menu.component';
import { CardComponent } from './card/card.component';
import { SavedPageComponent } from './saved-page/saved-page.component';
<<<<<<< HEAD

@NgModule({
  declarations: [
    AppComponent,
    MainComponent,
    VisitedPageComponent,
    LoginPageComponent,
    RegisterPageComponent,
    DetailPageComponent,
    FormPageComponent,
    MenuComponent,
    CardComponent,
    SavedPageComponent
=======

@NgModule({
  declarations: [
    AppComponent
>>>>>>> Front-End
=======

@NgModule({
  declarations: [
    AppComponent,
    MainComponent,
    VisitedPageComponent,
    LoginPageComponent,
    RegisterPageComponent,
    DetailPageComponent,
    FormPageComponent,
    MenuComponent,
    CardComponent,
    SavedPageComponent
>>>>>>> Front-End
  ],
  imports: [
    BrowserModule,
    AppRoutingModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
