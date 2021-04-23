import { Injectable } from '@angular/core';
import { HttpClient} from "@angular/common/http";

@Injectable({
  providedIn: 'root'
})
export class ArticleService {

  private barUrl = 'https://localhost:4321';

  constructor(private http: HttpClient) { }

  getArticles() {
    return this.http.get(this.barUrl + "/articles");
  }

  deleteArticle(id: number) {
    return this.http.delete(this.barUrl + '/articles/' + id);
  }

  getArticle(id: number) {
    return this.http.get(this.barUrl + '/articles/' + id);
  }
}
