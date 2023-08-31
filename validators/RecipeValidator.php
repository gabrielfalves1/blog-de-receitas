<?php

class RecipeValidator
{
    private $msg = [];

    public function validate(Recipe $recipe)
    {
        $recipe->setTitle(trim(htmlspecialchars($recipe->getTitle())));
        $recipe->setContent(trim(htmlspecialchars($recipe->getContent())));

        if (empty($recipe->getTitle()) || empty($recipe->getContent()) || empty($recipe->getUserId())) {
            $this->msg['all'] = "Preencha todos os campos.";
        } else {
            if (strlen($recipe->getTitle()) < 5) {
                $this->msg['title'] = 'O titulo precisa ter no mínimo 5 caracteres.';
            } elseif (strlen($recipe->getTitle()) > 80) {
                $this->msg['title'] = 'O titulo só pode ter até 80 caracteres.';
            } elseif (strlen($recipe->getContent()) < 10) {
                $this->msg['content'] = 'O conteudo da receita precisa ter no mínimo 10 caracteres.';
            }

            if (empty($this->msg)) {
                return $recipe;
            } else {
                return null;
            }
        }
    }


    public function getMsgs()
    {
        return $this->msg;
    }
}
