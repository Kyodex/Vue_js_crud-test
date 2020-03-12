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
        year:null,
        err_year:null,
        price:null,
        err_price:null
    },
    created: function(){
        var vm = this;
        axios.get('../assets/json/disc.json')
            .then(function(result){
                vm.discs=result.data;
            }).catch(error => console.log('erreur chargement fichier json :'+error));
    },
    methods :{
        valide : function(e){
            val=true; //formulaire valide si vrai
            //vérifie le title
            if(this.title==null){
                this.err_title='Veuillez rentrer un titre';
                val=false;
            }else if(!reg_texte.test(this.title)){
                this.err_title='Le titre n\'est pas valide';
                val=false;
            }else{
                this.err_title='';
            }
            //verifie de label
            if(this.label==null){
                this.err_label='Veuillez rentrer un label';
                val=false;
            }else if(!reg_texte.test(this.label)){
                this.err_label='Le Label n\'est pas valide';
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
            e.preventDefault();
        }
    }
    
    
    
    
    
    
    
    
    
}) 