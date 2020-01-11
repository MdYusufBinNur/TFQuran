

<script src="{{ asset('front_end/js/vendor/jquery-1.12.0.min.js') }}"></script>
<script src="{{ asset('front_end/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('front_end/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('front_end/js/jquery.meanmenu.js') }}"></script>
<script src="{{ asset('front_end/js/wow.min.js') }}"></script>
<script src="{{ asset('front_end/js/jquery.parallax-1.1.3.js') }}"></script>
<script src="{{ asset('front_end/js/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('front_end/js/jquery.flexslider.js') }}"></script>
<script src="{{ asset('front_end/js/chosen.jquery.min.js') }}"></script>
<script src="{{ asset('front_end/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('front_end/js/waypoints.min.js') }}"></script>
<script src="{{ asset('front_end/js/plugins.js') }}"></script>
<script src="{{ asset('front_end/js/main.js') }}"></script>
{{--<script src="{{ asset('front_end/js/new.js') }}"></script>--}}

{{--<script type="text/javascript" src="{{ asset('pro/js/jquery-3.3.1.min.js') }}"></script>--}}
<script type="text/javascript" src="{{ asset('pro/js/popper.min.js') }}"></script>
{{--<script type="text/javascript" src="{{ asset('pro/js/bootstrap.min.js') }}"></script>--}}
<script type="text/javascript" src="{{ asset('pro/js/mdb.min.js') }}"></script>
<script>

    $('#search').on('keyup',function(){
        //alert(this.value)
        //$('tbody').html(data).removeData;

        //console.log(html(data))
        $value=$(this).val();
        //alert($value)
        if ($value == null)
        {
            $('tbody tr').remove();
        }
        else
        {
            $.ajax({
                type : 'get',
                url : 'search',
                data:{'search':$value},
                success:function(res){

                    // console.log(data.replace(/(<([^>]+)>)/ig,""))


                    make_null(res)


                },error:function (res) {
                    console.log(res)
                }
            });
            function make_null(dat) {
                $('#myTable tbody').html(dat);
                dat = null

            }
        }

    });


</script>

<script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>

<script>
    function explanation(id) {
        //alert(id)
        $('#'+id).slideToggle();
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
<script>
    function bookmark_this(sura_no,ayah_no) {

         let sura_name = $('#surahh_name').val();
         //alert(sura_name)
        // $.ajax({
        //     type: 'get',
        //     url: 'get_bookmark_sura_info/'+sura_no,
        //
        //     success: function (response) {
        //         let data = JSON.parse(response)
        //         console.log(data)
        //         //alert(response)
        //             //sura_name.val(data.surah_name)
        //     },
        //     error: function (response) {
        //         console.log(response)
        //     }
        // });
        var bookmark = {

            name: sura_name,
            sura_no: sura_no,
            ayah_no: ayah_no
        }

        if(localStorage.getItem('bookmarks') === null){
            // Init array
            var bookmarks = [];
            // Add to array
            bookmarks.push(bookmark);
            // Set to localStorage
            localStorage.setItem('bookmarks', JSON.stringify(bookmarks));
        } else {
            // Get bookmarks from localStorage
            var bookmarks = JSON.parse(localStorage.getItem('bookmarks'));
            // Add bookmark to array
            bookmarks.push(bookmark);
            // Re-set back to localStorage
            localStorage.setItem('bookmarks', JSON.stringify(bookmarks));
        }


        location.reload();
        toastr.success('Bookmarked.', 'Successfully', {timeOut: 5000})
        //toastr["success"]("Bookmarked")
    }


    function fetchBookmarks(){
        //alert(1)
        // Get bookmarks from localStorage
        var bookmarks = JSON.parse(localStorage.getItem('bookmarks'));
        // Get output id
        var bookmarksResults = document.getElementById('bookmark_list');
        var bookmarksResultss = document.getElementById('bookmark_listt');

        //console.log(bookmarks)
        // Build output
        bookmarksResults.innerHTML = '';
        for(var i = 0; i < bookmarks.length; i++){
            var name = bookmarks[i].name;
            var url = bookmarks[i].ayah_no;
            var sura = bookmarks[i].sura_no;

            // bookmarksResults.innerHTML += '<li><a href="../bookmark_list/'+sura+'/'+url+'">'+name+ ':'+ url +'</a></li>'
            bookmarksResults.innerHTML += '<li><a href="../../bookmark_list/'+sura+'/'+url+'">'+name+ ':'+ url +'</a></li>'
            bookmarksResultss.innerHTML += '<li><a href="../../bookmark_list/'+sura+'/'+url+'">'+name+ ':'+ url +'</a></li>'
        }

    }

    function remove_bookmark(sura_no,ayah_no) {
        var bookmarks = JSON.parse(localStorage.getItem('bookmarks'));
        // Loop through the bookmarks
        for(var i =0;i < bookmarks.length;i++){
            if(bookmarks[i].sura_no === sura_no && bookmarks[i].ayah_no === ayah_no){
                // Remove from array
                bookmarks.splice(i, 1);
            }
        }
        // Re-set back to localStorage
        localStorage.setItem('bookmarks', JSON.stringify(bookmarks));


        fetchBookmarks();

        var base_url = window.location.origin;
        window.location.href = base_url;
        toastr['info']("Bookmarked Removed")
        // alert(window.location.origin)
        // location.reload();
    }
</script>
@yield('footer_js')
