var tab = new Vue({
    el:'#tableau',
    
    data:{
        discs:null,
    },
    methods : {
        link : function(id){    //quand l'utilisateur clique sur une ligne
            document.location.href='detail.php?id='+id;    //redirige vers la page de l'disc
        }
    },
    created: function(){
        var vm = this;
        axios.get('../assets/json/disc.json')
            .then(function(result){
                vm.discs=result.data;
            }).catch(error => console.log('erreur chargement fichier json :'+error));
    },
}) 