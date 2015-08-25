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
    this.events();
    this.imageEl = $("#images");
  }
  events(){
    this.el.on('click',(e)=>{
      let id = this.el.val();
      this.http('/images/'+id).then(({article, images})=>{
        this.articleId = article.id;
        this.showImages(images);
      });
    });
    this.myDropzone.on("sending", function(file, xhr, formData) {
      formData.append("article_id", this.articleId);
  }.bind(this));
  }
  showImages(images){
    this.imageEl.empty();
    images.forEach((image) => {
      this.imageEl.append(`
        <div id="images" class="col-md-3">
          <img src="${image}"">
        </div>`).slideDown(2000);
    });
  }
  http(url, param = {}, method = 'GET') {
    return ajax({
      method: method ,
      url: url,
      data: {param}
    });
  }
}
