<script>
    $(document).ready(function(){
        $('.past-week').knob({
            fgColor:'#728D72',
            format: function (v) {
                return v + '%';
            }
        });

        $('.past-month').knob({
            fgColor:'#C44D58',
            format: function (v) {
                return v + '%';
            }
        });

        c3.generate({
            bindto: '#event',
            data: {
                x: 'x',
                type: 'area',
                columns: [
                    ['x', '1 Sem', '2 Sem', '3 Sem', '4 Sem'],
                    ['Back-end', 3, 1, 4, 2],
                    ['Front-end', 2, 2, 2, 3]
                ],
                colors: {
                    'Back-end': '#628D6E',
                    'Front-end': '#428bca'
                }
            },
            axis: {
                y: {
                    show: false
                },
                x: {
                    type: 'category'
                }
            },
            tooltip: {
                format: {
                    title: function(){
                        return 'Tarefas';
                    }
                }
            }
        });
    });
</script>