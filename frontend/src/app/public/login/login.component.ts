import { Component, OnInit } from '@angular/core';
import { APIConnectionsService } from 'src/app/core/services/login/apiconnections.service';
import { TokenHandlerService } from 'src/app/core/services/login/token-handler.service';
import { AuthHandlerService } from 'src/app/core/services/login/auth-handler.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {

  public form = {
    username: '',
    password: null
  }
  public username: string= "";

  constructor(public apiconnections: APIConnectionsService, public tokenhandler: TokenHandlerService, public authhandler: AuthHandlerService, public router: Router) { }

  ngOnInit(): void {
  }

  public error = null;

  submitLogin() {
    this.username = this.form.username;
    return this.apiconnections.login(this.form).subscribe(
      data => this.handleResponse(data),
      error => this.handleError(error)
    );
  }

  handleResponse(data: any) {
    this.authhandler.setUsername(this.username);
    this.tokenhandler.handle(data.access_token);
    this.authhandler.setAuthStatus(true);
    this.router.navigateByUrl('/profile');
  }

  handleError(error: any) {
    this.error = error.error.error;
  }

}
