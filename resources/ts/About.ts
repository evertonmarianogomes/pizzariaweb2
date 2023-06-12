import $ from "jquery";
import { Modal } from "bootstrap";
import moment from "moment";

var global_id = 0;

class AboutDAO {
    select(id: Number) {
        const url = 'http://127.0.0.1:8000/admin/about/get';
        const data = { id: id, idade: 30 };
        const requestHeaders: HeadersInit = new Headers();
        requestHeaders.set('Content-Type', 'application/json');
        requestHeaders.set('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content')!);

        return fetch(url, {
            method: 'post',
            headers: requestHeaders,
            body: JSON.stringify(data)
        });
    }

    update(url: string, data: any) {
        const requestHeaders: HeadersInit = new Headers();
        requestHeaders.set('Content-Type', 'application/json');
        requestHeaders.set('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content')!);

        return fetch(url, {
            method: 'post',
            headers: requestHeaders,
            body: JSON.stringify(data)
        });
    }

}

const editAbout = () => {
    let editButtonList: Array<HTMLElement> = Array.from(document.querySelectorAll(".btn-primary.edit"));
    let modal = new Modal(document.querySelector("#updateModal") as HTMLElement);
    let dao = new AboutDAO();

    editButtonList.map((button) => {
        button.addEventListener("click", (e) => {
            e.preventDefault();
            let modalBody = document.querySelector("#updateAboutScreenForm") as HTMLElement;

            modalBody.innerHTML = `<p>Carregando dados, aguarde..</p>`;
            let id: number = Number(button.dataset.id);

            dao.select(id).then(response => response.json())
                .then(result => {
                    global_id =  result.id;
                    // console.log('Resposta:', result);
                    modal?.show();
                    modalBody.innerHTML = `
                    <div class="mb-2">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" class="form-control" name="name" id="name" @required(true) value="${result.name}">
                    </div>
    
                    <div class="mb-2">
                        <label for="description" class="form-label">Descrição</label>
                        <textarea name="description" id="description" class="form-control" @required(true) rows="5">${result.description}</textarea>
                    </div>
                    <input type="hidden" name="${result.id}" class="hidden">
                    <p>Criado em: ${(moment(result.created_at)).format('DD/MM/YYYY HH:mm')}</p>
                    <p>Atualizado em: ${(moment(result.updated_at)).format('DD/MM/YYYY HH:mm')}</p>
            
                    <button type="submit" class="btn btn-primary mt-1">Enviar</button>
                    `;
                })
                .catch(error => {
                    console.error('Erro:', error);
                });
        });
    });
}

const submitForm = () => {
    let form = document.querySelector("#updateAboutScreenForm") as HTMLFormElement;

    form.addEventListener("submit", (e) => {
        e.preventDefault();
        let formData = new FormData(form);
        // let modalBody = document.querySelector("#updateAboutScreenForm") as HTMLElement;
        // const id = ((document.querySelector("#updateModalBody") as HTMLElement).querySelector('input[type="hidden"]') as HTMLInputElement).name;
        form.innerHTML = "Atualizando dados, aguarde...";

        setTimeout(() => {
            (new AboutDAO()).update(form.action, {
                id: global_id,
                name: formData.get("name"),
                description: formData.get("description")
            }).then(response => response.json())
            .then(result => {
                if (result.reload) {
                    console.log(result);
                    form.innerHTML = "Atualizado com sucesso";
                    setTimeout(() => {
                        location.reload();
                    }, 1000);
                }
            }).catch(error => {
                console.error(error);
            });
        }, 2000);
    });
}

window.addEventListener("load", () => {
   
    editAbout();
    submitForm();
});