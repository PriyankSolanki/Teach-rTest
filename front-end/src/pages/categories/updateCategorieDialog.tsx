import React, { useRef, useState } from "react";
import { Dialog } from "primereact/dialog";
import { Button } from "primereact/button";
import axios from "axios";
import { Toast } from "primereact/toast";
import { fetchCategories, updateCategories } from "@/api/apiCategories";



interface CategorieTableProps {
    closeDialog: () => void; 
    visible:boolean;
    setCategories: (data:any) => void;
    selectedCategorie:any;
}

const UpdateCategorieDialog : React.FC<CategorieTableProps> = ({ visible, closeDialog, setCategories, selectedCategorie }) => {
  const [categorie, setCategorie] = useState({ nom: selectedCategorie.nom || ""});
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState<string | null>(null);
  const toast = useRef<Toast>(null);

  const handleUpdateCategorie = async () => { 
    
    if(categorie.nom == "") {
        const messageError = document.getElementById("errorMessage");
        if (messageError) {
            messageError.textContent = "Erreur : Le nom de la catégorie est requis";
            messageError.classList.add("visible"); 
        }
    }else if(categorie.nom.length>255) {
        const messageError = document.getElementById("errorMessage");
        if (messageError) {
            messageError.textContent = "Erreur : Le nom ne doit pas dépasser 255 caractères";
            messageError.classList.add("visible"); 
        }
    }else {
        const messageError = document.getElementById("errorMessage");
        if (messageError) {
            messageError.textContent = "";
        }
        try {
            const response = await updateCategories(selectedCategorie.id, categorie);
            if(toast.current){
                toast.current?.show({
                    severity: "success",
                    summary: "Succès",
                    detail: "Catégorie modifié avec succès !",
                  });
            }
            
            try {
                const data = await fetchCategories();
                setCategories(data); 
                setLoading(false);
              } catch (err) {
                setError("Impossible de récupérer les catégories.");
                setLoading(false);
              }
              
          } catch (error : unknown) {
            const messageError = document.getElementById("errorMessage");
            if (axios.isAxiosError(error)) {
                if (error.response) {
                    if (messageError) {
                        messageError.classList.add("visible"); 
                        messageError.textContent = error.response.data.message;
                    }
                } else if (error.request) {
                  console.error("Erreur réseau :", error.request);
                  setError("Erreur réseau : Impossible de joindre le serveur.");
                } else {
                  console.error("Erreur inattendue :", error.message);
                  setError(`Erreur inattendue : ${error.message}`);
                }
              } else {
                console.error("Erreur non capturée :", error);
                setError("Erreur inconnue.");
              }
          }
        closeDialog();
    }
  };

  return (<>
    <Toast ref={toast} />
    <Dialog header="Modifier une catégorie" visible={visible}  style={{ width: "50vw" }} onHide={closeDialog}>
    <p style={{color:"red"}} id="errorMessage"></p>
      <div className="p-fluid">
        <div className="field">
          <label htmlFor="nom">Nom</label>
          <input id="nom" type="text"  value={categorie.nom}  onChange={(e) => setCategorie({ ...categorie, nom: e.target.value })} className="p-inputtext p-component"  />
        </div>
      </div>
        <Button label="Annuler" className="p-button-text" onClick={closeDialog} />
        <Button label="Modifier" className="p-button-primary" onClick={handleUpdateCategorie} />
    </Dialog></>
  );
};

export default UpdateCategorieDialog;
