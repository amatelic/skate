/*jshint esnext: true */
import $ from  'jquery';
import {ajax} from  'jquery';
import Dropzone from 'dropzone';

export default class Images{
  constructor(el){
    this.el = $(el);
    this.myDropzone = new Dropzone("#my-dropzone");
    Dropzone.autoDiscover = false;
    this.articleId = 1;
    this.imageEl = $("#images");
    this.allImages = $('img');
    this.events();
  }
  events(){
    this.imageEl.on('click', '.images-cover', function (e) {
      var el = $(e.target);
      var id = el.data('id');
      //regular expresion for getting the name of image
      var src = el.find('img').attr('src').match(/[^\/]+$/g);
      //deleting image
      this.http(`/admin/images/${id}`, {img: src[0]}, 'DELETE').then(function (data) {
        el.fadeOut();
      });
    }.bind(this));
    this.el.on('click',(e)=>{
      let id = this.el.val();
      this.http('/admin/images/'+id).then(({article, images})=>{
        this.articleId = article.id;
        this.showImages(images, article.id);
        this.showOnArticle(article.title);
      });
    });
    this.myDropzone.on("sending", function(file, xhr, formData) {
      formData.append("article_id", this.articleId);
  }.bind(this));
  }
  showOnArticle(title){
    $('#articleName').text(title);
  }
  showImages(images, id){
    this.imageEl.empty();
    images.forEach((image) => {
      this.imageEl.append(`
        <div id="images" data-id="${id}" class="images-cover  col-sm-4">
          <img src="../${image}"">
        </div>`).slideDown(2000);
    });
  }
  http(url, param = {}, method = 'GET') {
    return ajax({
      method: method ,
      url: url,
      data: param
    });
  }
}
