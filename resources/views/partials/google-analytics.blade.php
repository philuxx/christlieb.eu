@if(config('blog.google_analytics'))
    <script>
        window.ga = function () {
            ga.q.push(arguments)
        };
        ga.q = [];
        ga.l = +new Date;
        ga('create', '{{config('blog.google_analytics')}}', 'auto');
        ga('set', 'anonymizeIp', true);
        ga('send', 'pageview')
    </script>
    <script src="https://www.google-analytics.com/analytics.js" async defer></script>
@endif
