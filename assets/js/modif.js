var id= parseInt(location.search.substring(4));   //récupère l'id
var reg_texte= new RegExp('^[A-Za-zÀ-ú\-_ ]+$');
var reg_num= new RegExp('^[0-9]{1,9}[.]?[0-9]{0,3}$');

var tab = new Vue({
    el:'#app',
    
    data:{
        discs:null,
        title:null,
        err_title:null,
        label:null,
        err_label:null,
        message:null,
        year:null,
        price:null,
        trouve:true
    },
    created: function(){
        var vm = this;
        axios.get('../assets/json/disc.json')
            .then(function(result){
                vm.discs=result.data;
                var res = result.data   //contenu du fichier json
                var id2=-1; //id2 vaut -1 sil 'ID n'est pas trouvé
                for(var i=0;i<res.length;i++){  //parcourt la liste
                    if(res[i].disc_id==id){  //une fois trouvé
                        id2=i;
                    }
                }
                if(id2==-1){   //si l'utilisateur n'a pas été trouvé
                    vm.message='erreur : le titre na pas été trouvé';
                    vm.trouve=false;  //affiche le message d'erreur
                }else{
                    vm.title=result.data[id2].disc_title;   //récupère les informations
                    vm.label=result.data[id2].disc_label;
                    vm.price=result.data[id2].disc_price;
                    vm.year=result.data[id2].disc_year;
                }
            }).catch(error => console.log('erreur chargement fichier json :'+error));
    },
    methods :{
        valide : function(e){
            val=true; //formulaire valide si vrai
            //vérifie le title
            if(this.title==null){
                this.err_title='Veuillez rentrer un title';
                val=false;
            }else if(!reg_texte.test(this.title)){
                this.err_title='Le title n\'est pas valide';
                val=false;
            }else{    
                this.err_title='';
            }
            //verifie le label
            if(this.label==null){
                this.err_label='Veuillez rentrer un label';
                val=false;
            }else if(!reg_texte.test(this.label)){
                this.err_label='Le label n\'est pas valide';
                val=false;
            }else{
                this.err_label='';
            }
   //verifie le prix
            if(this.price==null){
                this.err_price='Veuillez rentrer un prix';
                val=false;
            }else if(!reg_num.test(this.price)){
                this.err_price='Le Label n\'est pas valide';
                val=false;
            }else{
                this.err_price='';
            }
            //verif year
            if(this.year==null){
                this.err_year='Veuillez rentrer un prix';
                val=false;
            }else if(!reg_num.test(this.year)){
                this.err_year='Le L\'année n\'est pas valide';
                val=false;
            }else{
                this.err_year='';
            }
            if(val){    //si le formulaire est valide
                return true;
            }
            if(val){    //si le formulaire est valide
            }
            e.preventDefault();
        }
    }
});