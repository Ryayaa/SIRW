@extends('user-login.index')

@section('content')
<section class="mt-4">
    <section id="intro-bansos" class="intro-bansos ">
        <div class="container ">
            <div class=" mb-4">
                <div class="">
                    <h2 class="section-title text-center mb-3">Informasi Mengenai Bantuan Sosial</h2>
                    <p class="text-left section-description">Bansos atau Bantuan Sosial adalah bantuan berupa uang atau barang dari pemerintah kepada masyarakat yang bertujuan untuk mengurangi beban hidup mereka. Bansos ini diberikan kepada masyarakat yang membutuhkan sesuai dengan kriteria yang telah ditentukan.</p>
                </div>
            </div>
            <div class="row">
                <div class="">
                    <div class="text-left">
                        <h2 class="section-title mb-3 text-center">Bantuan Sosial Yang dapat Diterima</h2>
                        <p>Berikut bantuan Sosial yang dapat diterima oleh warga di Kelurahan Jatimulyo : </p>
                        <ul class="list-group col-md-8">
                            @foreach($bansosList as $bansos)
                            <li class="ms-4">
                                <h3 class="bansos-title mb-2" >{{ $bansos->nama_bansos }}</h3>
                                <p class="bansos-description">{{ $bansos->deskripsi }}</p>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>



<div id="daftar-bansos" class="daftar-bansos">
    <div class="container">
        <div class="card" id="bansos-card">
            <h3 class="mb-4 section-title">Pertanyaan Yang Sering Ditanyakan</h3>
            <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link" type="button">
                        Data Apa yang Diperlukan Untuk Pengajuan Bansos?
                    </button>
                </h5>
            </div>
            <div id="collapseBansos" class="collapse" aria-labelledby="headingOne" data-parent="#daftar-bansos">
                <div class="card-body">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore aut non deleniti quibusdam eum fugit nisi mollitia distinctio eos est autem perspiciatis, architecto dolorum sit aspernatur tempore. Dignissimos odit reprehenderit minima nihil obcaecati dolor minus ex, modi nisi natus deserunt eveniet voluptate harum temporibus quae amet magnam corporis itaque? Deserunt quaerat explicabo, modi ratione, aliquam deleniti ut soluta nobis vero exercitationem suscipit vel reprehenderit sunt! In maxime repudiandae dolore atque ducimus? Eligendi cupiditate eum deleniti ut veritatis reiciendis quam eaque libero dolor. Eum quasi quis nesciunt optio architecto aspernatur amet labore libero a, adipisci consectetur in, unde iste qui? Facere ipsam vitae recusandae veritatis. Beatae harum quasi atque. Cumque, obcaecati blanditiis optio ipsum voluptatem quidem rem ab nesciunt cupiditate iure unde a dicta! Distinctio consequatur non praesentium. Recusandae in saepe reiciendis nisi molestias omnis maiores nesciunt officia vel debitis illo quis ex dolorum molestiae deleniti, reprehenderit accusamus, quo expedita commodi temporibus ullam quam inventore aspernatur. Doloribus, nostrum aut doloremque rerum corrupti officiis omnis magni provident velit, libero dolore qui vel cupiditate! Reprehenderit aliquam vitae odio, expedita enim, distinctio, ipsam error aspernatur perspiciatis odit explicabo culpa deleniti quidem itaque qui animi debitis mollitia assumenda laborum? Eos suscipit placeat aliquid! Quam, blanditiis.</p>
                </div>
            </div>
        </div>

        <!-- Add new collapsible card -->
        <div class="card mt-3" id="proses-pengajuan-card">
            <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                    <button class="btn btn-link" type="button">
                        Bagaimana Proses Pengajuan Bansos?
                    </button>
                </h5>
            </div>
            <div id="collapseProsesPengajuan" class="collapse" aria-labelledby="headingTwo" data-parent="#daftar-bansos">
                <div class="card-body">
                    <!-- Add content here -->
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, tenetur nostrum sit obcaecati, dolores exercitationem praesentium unde repellat totam animi laudantium ut rerum quae suscipit ab. A amet officia dolores unde perspiciatis reiciendis optio, harum iure culpa error reprehenderit sunt molestias qui dolorem inventore vel sapiente veniam exercitationem placeat? Ipsam, quam voluptates beatae illo placeat id modi facere perspiciatis mollitia, quod, dolor sequi. Quas quisquam possimus at vero placeat accusamus autem quos! Velit facilis saepe error cupiditate doloremque adipisci ipsam repudiandae? Provident ullam, sit necessitatibus, voluptatem nam itaque nisi est sapiente facilis veniam assumenda doloribus fugiat? Reprehenderit delectus illo maiores ducimus. Iusto porro dicta sunt odio reiciendis! Earum pariatur illum nemo distinctio iure. Adipisci, cupiditate earum, aliquid expedita vel tempore tempora temporibus maxime quibusdam dolore eaque praesentium nostrum rerum consectetur totam iusto voluptatibus et odio a ab asperiores suscipit. Est voluptatum dolor quibusdam voluptate distinctio consectetur, itaque tempore molestias, magni similique quae. Magnam expedita mollitia ratione, ut recusandae nemo aperiam corporis saepe quaerat quae enim accusamus officiis et, voluptas repudiandae nostrum beatae voluptatibus, labore ex minus vero iste! Temporibus rem, sapiente impedit, libero, sit sunt fuga ullam cumque facilis tempora qui tempore dolorem minus velit quidem! Excepturi quisquam neque ducimus sint, commodi quas pariatur id amet blanditiis repellat impedit perspiciatis dolorum eum doloribus repudiandae delectus suscipit placeat natus minus nisi! Quisquam iste earum nam dignissimos voluptate consequatur tempora fugiat. Architecto sunt sit a pariatur eum veniam debitis impedit dolore illum, adipisci laudantium, cumque modi nemo sequi eaque reprehenderit asperiores commodi quo nihil quis fugiat incidunt ipsum nulla. Veniam, exercitationem modi debitis facere ducimus voluptates cumque illum consequuntur quos aut possimus id dolorum, error eligendi quis cum corrupti quaerat velit. Nulla voluptate, suscipit amet rerum, minima ex tenetur doloribus, recusandae earum officiis illo aut delectus? Deleniti alias voluptatibus pariatur odio minus laudantium nihil dolorem voluptates in sed facere soluta rerum natus ratione est iusto quaerat, eveniet suscipit voluptate molestias reprehenderit deserunt? Et animi iste distinctio rerum repellendus sequi alias ipsum amet ipsa, voluptatum, soluta, facilis molestias explicabo nihil esse tempora nemo incidunt optio inventore consectetur quos. Animi, alias corrupti facere commodi corporis ipsam deserunt natus ipsum similique? Nihil numquam, dolores maiores debitis provident ducimus omnis dolor, ut adipisci fugiat dignissimos eaque asperiores pariatur doloremque dolorum quis ipsum harum quam facilis soluta qui totam aperiam. Magni similique consequatur illum magnam maxime aut sit incidunt numquam, corporis beatae vero totam repudiandae ex culpa sed, eligendi veniam? Architecto, voluptatibus. Porro sequi, quo laboriosam earum provident animi nam totam id neque ad tempora iste distinctio pariatur aliquid natus non. Voluptatem reiciendis aliquam voluptates similique consectetur quis corrupti temporibus laboriosam rerum mollitia ipsam numquam natus voluptate, accusamus eius iure ea sit! Molestias quae reprehenderit eum est laborum. Libero alias ratione voluptatum nam odio, et numquam veritatis sapiente vero explicabo cupiditate, illo natus odit quos inventore similique ea dolor eaque voluptas facilis delectus? Officia quam officiis harum dicta, eaque sequi. Odit quis doloribus cupiditate vel inventore tempore beatae. Blanditiis autem quam nisi non quod eveniet, cupiditate asperiores.</p>
                </div>
            </div>
        </div>

        <div class="card mt-3" id="hasil-seleksi-bansos">
            <div class="card-header" id="headingThree">
                <h5 class="mb-0">
                    <button class="btn btn-link" type="button">
                        Bagaimana Cara Melihat Hasil Pengajuan Bansos?
                    </button>
                </h5>
            </div>
            <div id="collapseHasilSeleksi" class="collapse" aria-labelledby="headingThree" data-parent="#daftar-bansos">
                <div class="card-body">
                    <!-- Add content here -->
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quaerat ex, nobis, culpa blanditiis consectetur rerum praesentium deserunt vitae nostrum, magnam quos! Ut quasi dolores quam assumenda illo eum exercitationem iste unde. Natus, quis delectus rerum sit odit porro omnis excepturi quo in ut eius deserunt. Inventore vero dolorum blanditiis modi possimus voluptatum reprehenderit eos molestiae at provident tempora voluptate dolores accusantium, pariatur distinctio aspernatur, quae perspiciatis ea dolor, ipsa consequatur? Earum, voluptatibus. Hic impedit voluptate nobis possimus, labore illo provident nulla tempore nam animi quia recusandae repellendus reiciendis maxime laborum! Dolorem, corrupti inventore, ipsam ab vero veritatis quibusdam quis quisquam cumque distinctio saepe. Maxime voluptatem nam quos saepe ut similique sed pariatur molestiae minima? Delectus ullam hic magnam. Voluptates ad, sequi ut voluptas nulla esse! Asperiores repellendus nostrum, error harum distinctio inventore expedita, eligendi laudantium dolorem sint autem voluptas, adipisci in. Et optio accusantium sunt nobis pariatur blanditiis officiis mollitia, neque aspernatur dolores quisquam molestiae veritatis incidunt eius. Molestiae quibusdam nobis quis dignissimos ex assumenda illum consequatur, cupiditate, commodi magnam neque nulla dolorum numquam tempore eum dolores harum aspernatur blanditiis earum veniam alias iure. Est accusamus nulla iusto beatae quo eius commodi saepe, ea eos voluptatum, iure fugit possimus in.</p>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection

<style>
    /* General Styles */

    /* Intro Section */



</style>

@push('js')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var collapsibleCards = document.querySelectorAll('.card');

        collapsibleCards.forEach(function (card) {
            card.addEventListener('click', function () {
                var collapseId = card.querySelector('.collapse').id;
                toggleCollapse(collapseId);
            });
        });

        function toggleCollapse(collapseId) {
            var collapseElement = document.getElementById(collapseId);
            if (collapseElement.classList.contains('show')) {
                collapseElement.classList.remove('show');
            } else {
                collapseElement.classList.add('show');
                closeOtherCollapse(collapseId);
            }
        }

        function closeOtherCollapse(currentCollapseId) {
            collapsibleCards.forEach(function (card) {
                var collapseId = card.querySelector('.collapse').id;
                if (collapseId !== currentCollapseId) {
                    var otherCollapse = document.getElementById(collapseId);
                    otherCollapse.classList.remove('show');
                }
            });
        }
    });
</script>
@endpush
