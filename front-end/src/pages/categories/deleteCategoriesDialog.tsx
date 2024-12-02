import React, { useEffect, useRef, useState } from "react";
import { Dialog } from "primereact/dialog";
import { Button } from "primereact/button";
import { InputTextarea } from "primereact/inputtextarea";
import { InputNumber } from "primereact/inputnumber";
import { deleteCategories, fetchCategories } from "@/api/apiCategories";
import { Dropdown, DropdownChangeEvent } from "primereact/dropdown";
import { addProduits, deleteProduits, fetchProduits } from "@/api/apiProduits";
import axios from "axios";
import { Toast } from "primereact/toast";



interface CategorieTableProps {
    closeDialog: () => void; 
    visible:boolean;
    setCategories: (data:any) => void;
    selectedCategorie:any;
}

const deleteCategorieDialog : React.FC<CategorieTableProps> = ({ visible, closeDialog, setCategories, selectedCategorie }) => {
  const [categorie, setCategorie] = useState({ nom: selectedCategorie.nom});
  const toast = useRef<Toast>(null);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState<string | null>(null);

  const handleDeleteCategorie = async () => { 
        try {
            const response = await deleteCategories(selectedCategorie.id);
            if(toast.current){
                toast.current?.show({
                    severity: "success",
                    summary: "Succès",
                    detail: "Catégorie supprimé avec succès !",
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
    
  };


  return (<>
    <Toast ref={toast} />
    <Dialog header="Supprimer une catégorie" visible={visible}  style={{ width: "50vw" }} onHide={closeDialog}>
    <p style={{color:"red"}} id="errorMessage"></p>
      <div className="p-fluid">
        <div className="field">
            <p>Nom de la catégorie : <strong>{selectedCategorie.nom}</strong></p>
        </div>
      </div>
        <Button label="Annuler" className="p-button-text" style={{ color: "red" }} onClick={closeDialog} />
        <Button label="Supprimer" className="p-button-danger" onClick={handleDeleteCategorie} />
    </Dialog></>
  );
};

export default deleteCategorieDialog;
