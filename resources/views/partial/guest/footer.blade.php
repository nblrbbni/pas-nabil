<footer class="py-5">
    <div class="row">
        <div class="col-12 col-md-6 mb-3">
            <h5>Berita</h5>
            <ul class="nav flex-column">
                @foreach ($kategori as $value)
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">{{ $value->nama_kategori }}</a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="col-12 col-md-6 mb-3">
            <form>
                <h5>Subscribe to our newsletter</h5>
                <p>Monthly digest of what's new and exciting from us.</p>
                <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                    <label for="newsletter1" class="visually-hidden">Email address</label>
                    <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                    <button class="btn btn-primary" type="button">Subscribe</button>
                </div>
            </form>
        </div>
    </div>

    <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
        <p>&copy; 2023 Portal Berita. All rights reserved.</p>
    </div>
</footer>
