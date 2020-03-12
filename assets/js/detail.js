var id= parseInt(location.search.substring(4));   //récupère l'id

var tab = new Vue({
    el:'#app',    
    data:{
        disc:null,
        message:null,
        trouve:true,
    },
    created: function(){
        var vm = this;
        axios.get('../assets/json/disc.json')
            .then(function(result){
                var res = result.data   //contenu du fichier json
                var id2=-1; //id2 vaut -1 sil 'ID n'est pas trouvé
                for(var i=0;i<res.length;i++){  //parcourt la liste
                    if(res[i].disc_id==id){  //une fois trouvé
                        id2=i;
                    }
                }
                if(id2==-1){   //si l'utilisateur n'a pas été trouvé
                    vm.message='erreur : l\'utilisateur n\'a pas été trouvé';
                    vm.trouve=false;  //affiche le message d'erreur
                }else{
                    vm.disc=result.data[id2];   //récupère les informations
                }
            }).catch(error => console.log('erreur chargement fichier json :'+error));
    },
}) 