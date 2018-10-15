<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NewUserRepository")
 */
class NewUser
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $manageremail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $team;

    /**
     * @ORM\Column(type="boolean")
     */
    private $JIRA_ID_created;

    /**
     * @ORM\Column(type="boolean")
     */
    private $BitBucket_ID_created;

    /**
     * @ORM\Column(type="boolean")
     */
    private $GoogleGroups_added;

    /**
     * @ORM\Column(type="boolean")
     */
    private $SSO;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getManageremail(): ?string
    {
        return $this->manageremail;
    }

    public function setManageremail(?string $manageremail): self
    {
        $this->manageremail = $manageremail;

        return $this;
    }

    public function getTeam(): ?string
    {
        return $this->team;
    }

    public function setTeam(string $team): self
    {
        $this->team = $team;

        return $this;
    }

    public function getJIRAIDCreated(): ?bool
    {
        return $this->JIRA_ID_created;
    }

    public function setJIRAIDCreated(bool $JIRA_ID_created): self
    {
        $this->JIRA_ID_created = $JIRA_ID_created;

        return $this;
    }

    public function getBitBucketIDCreated(): ?bool
    {
        return $this->BitBucket_ID_created;
    }

    public function setBitBucketIDCreated(bool $BitBucket_ID_created): self
    {
        $this->BitBucket_ID_created = $BitBucket_ID_created;

        return $this;
    }

    public function getGoogleGroupsAdded(): ?bool
    {
        return $this->GoogleGroups_added;
    }

    public function setGoogleGroupsAdded(bool $GoogleGroups_added): self
    {
        $this->GoogleGroups_added = $GoogleGroups_added;

        return $this;
    }

    public function getSSO(): ?bool
    {
        return $this->SSO;
    }

    public function setSSO(bool $SSO): self
    {
        $this->SSO = $SSO;

        return $this;
    }
}
