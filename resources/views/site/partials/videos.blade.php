<section id="videos" class="d-none">

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
      Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
      aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>


    <div class="content container py-5">
      <div class="text">
        <span>"</span>
        <h1>Veja o que <br> clientes felizes <br> citybens tem a <br> dizer:</h1>
      </div>

      <ul class="videos-list d-flex align-items-center">
        <li class="video-item d-flex flex flex-column align-items-center justify-content-center p-3">
          <video src="" class="video" width="275" height="200" controls>
            <source src="videos/video-1.mp4" type="video/mp4">
          </video>
          <span>Carla Amarantes</span>
          <span>São Paulo / SP</span>
          <button class="ver-video">ver video</button>

          <!-- <div class="thumbnail">
            <img src="images/videos/thumbnails/video-1.png" alt="" width="275" height="200">
          </div> -->

          <div id="btn-play" class="btn-play d-flex justify-content-center align-items-center" data-toggle="modal"
            data-target="#exampleModalCenter">
            <div class="d-flex justify-content-center align-items-center">
              <svg width="9" height="17" viewBox="0 0 9 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8.5 8.5L0 0V17L8.5 8.5Z" fill="white" />
              </svg>
            </div>
          </div>
        </li>

        <li class="video-item d-flex flex flex-column align-items-center justify-content-center p-3">
            <video src="" class="video" width="275" height="200" controls>
              <source src="https://www.youtube.com/watch?v=3-AJQ_kBY24&list=RDMM3-AJQ_kBY24&start_radio=1" type="video/mp4">
            </video>
            <span>Carla Amarantes</span>
            <span>São Paulo / SP</span>
            <button class="ver-video">ver video</button>

            <!-- <div class="thumbnail">
              <img src="images/videos/thumbnails/video-1.png" alt="" width="275" height="200">
            </div> -->

            <div id="btn-play" class="btn-play d-flex justify-content-center align-items-center" data-toggle="modal"
              data-target="#exampleModalCenter">
              <div class="d-flex justify-content-center align-items-center">
                <svg width="9" height="17" viewBox="0 0 9 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M8.5 8.5L0 0V17L8.5 8.5Z" fill="white" />
                </svg>
              </div>
            </div>
          </li>
      </ul>

    </div>
  </section>
