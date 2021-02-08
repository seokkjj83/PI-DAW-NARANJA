import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { CardComponent } from './card/card.component';
import { DetailPageComponent } from './detail-page/detail-page.component';
import { FormPageComponent } from './form-page/form-page.component';
import { LoginPageComponent } from './login-page/login-page.component';
import { MainComponent } from './main/main.component';
import { MenuComponent } from './menu/menu.component';
import { RegisterPageComponent } from './register-page/register-page.component';
import { SavedPageComponent } from './saved-page/saved-page.component';
import { VisitedPageComponent } from './visited-page/visited-page.component';

const routes: Routes = [
  {path: 'card', component:CardComponent},
  {path: 'detailpage', component:DetailPageComponent},
  {path: 'formpage', component:FormPageComponent},
  {path: 'loginpage', component:LoginPageComponent},
  {path: 'main', component:MainComponent},
  {path: 'menu', component:MenuComponent},
  {path: 'registerpage', component:RegisterPageComponent},
  {path: 'savedpage', component:SavedPageComponent},
  {path: 'visitedpage', component:VisitedPageComponent},
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
