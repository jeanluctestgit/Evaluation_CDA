import { Component, OnInit } from '@angular/core';
import {ArticleService} from "../../services/article/article.service";

@Component({
  selector: 'app-article',
  templateUrl: './article.component.html',
  styleUrls: ['./article.component.scss']
})
export class ArticleComponent implements OnInit {

  constructor(private articleService: ArticleService) {
    this.articleService.getArticles().subscribe(r => {
    });

    this.articleService.deleteArticle(5).subscribe(r => {

    });

    this.articleService.getArticle(4).subscribe(() => {

    })
  }

  ngOnInit(): void {
  }


}
