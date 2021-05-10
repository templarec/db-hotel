var app = new Vue({
    el: '#root',
    data: {
        stanze:{},
        currentStanza: {},
        result: false,
        currentSelection: 0
    },
    mounted () {
        axios.get('./fetch.php', {
            params: {
                fetch: "fetch"
            }
        }).then((risposta)=>{
            this.stanze = risposta.data.response
        })
    },
    computed: {},
    methods: {
        getInfo: function (id) {
            this.currentSelection = id
            axios.get('./fetch.php', {
                params: {
                    stanza: id
                }
            }).then((risposta)=>{
                this.currentStanza = risposta.data.response[0]
            })
        }
    }
});