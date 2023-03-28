import Dropzone from 'dropzone';


Dropzone.autoDiscover = false;


const dropzone = new Dropzone('#Dropzone', {
   dictDefaultMessage: 'Sube tu Imagen',
   acceptedFiles: '.png, .jpg, .jpeg, .gif',
   addRemoveLinks: true, /**Eliminar su Imagen */
   dictRemoveFile: 'Borrar Archivo',
   maxFiles: 1,
   uploadMultiple: false,

   init: function(){
        if(document.querySelector('[name="imagen"]').value.trim()){
            const imgPublicada = {};
            imgPublicada.size = 1000;
            imgPublicada.name = document.querySelector('[name="imagen"]').value.trim();


            this.options.addedfile.call(this, imgPublicada);
            this.options.thumbnail.call(this, imgPublicada, `/uploads/${imgPublicada.name}`);
            imgPublicada.previewElement.classList.add('dz-success', 'dz-complete');

        }
   }
});

dropzone.on('success', (file, response)=>{
    console.log(response);

    document.querySelector(' [name="imagen"] ').value = response.imagen;
})


dropzone.on('removedfile', ()=>{
    document.querySelector(' [name="imagen"] ').value = '';
})


// dropzone.on('sending', (file, xhr, formData) =>{
//     console.log(formData)

// })


// dropzone.on('error', (file, message) => {
//     console.log(message);
// })
