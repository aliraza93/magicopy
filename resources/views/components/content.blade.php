<div class="bg-light">
    <section class="" >
        <div class="grid-box">
            <div class="container sml-container">
                <div class="row g-3">
                    @foreach($contents as $content)
                        <div class="col-lg-4 col-md-6 content-card">
                            <a href="#" data-toggle="modal" data-target="#content-details" onclick="showContent({{ $content->id }})">
                                <div class="grid-box-item">
                                    <p>{{ ucfirst($content->ads->ads_category) }}</p>
                                    <h5>{{ mb_strimwidth($content->description, 0, 100, "...") }}</h5>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    <div class="col-lg-12">
                        <div class="page-options">
                            <p>&nbsp;</p>
                            {{ $contents->render() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>