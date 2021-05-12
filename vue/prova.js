var app = new Vue({
    el: '#app',
    data:{

        image:'https://cdn1.sportngin.com/attachments/photo/1040/6534/Soccer_Field_large.jpg',
        
        variants: [
            {id:112,sport:'calcio a 5',image:'http://www.adamsport.it/wp-content/uploads/2015/04/calcio-o-calcetto-a-5-cinque.jpg'},
            {id:113,sport:'beachvolley',image:'https://4.imimg.com/data4/GK/CT/MY-7887487/beach-volleyball-court-500x500.jpg'},
            {id:114,sport:'calcio a 8',image:'https://www.riccionesport.it/wp-content/uploads/2019/01/campo_via_artigianato_ill.jpg'},
            {id:115,sport:'rugby',image:'https://media.gettyimages.com/photos/sport-field-picture-id182146563?s=612x612'},
            {id:116,sport:'squash',image:'https://previews.123rf.com/images/tito/tito0709/tito070900128/1778028-the-squash-court-formed-with-glass-wall.jpg'}
        ]
    },
    methods:{
        updateImage:function(im){
            this.image = im;
        }
    }

        
});

/*
var app = new Vue({
    el: '#app',
    data: {
        image:  '../assets/img/bootstrap-icons.png',
        product: 'Mascherina',
        description: 'Mascherina  chirurgica'
    }
});*/