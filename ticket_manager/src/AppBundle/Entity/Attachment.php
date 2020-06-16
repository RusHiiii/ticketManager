<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Attachment
 *
 * @ORM\Table(name="attachment")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AttachmentRepository")
 */
class Attachment
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="attachment_name", type="string", length=255)
     */
    private $attachmentName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="attachment_upload_date", type="date")
     */
    private $attachmentUploadDate;

    /**
     * @var string
     *
     * @ORM\Column(name="attachment_path", type="string", length=255)
     */
    private $attachmentPath;

    /**
     * @ORM\ManyToOne(targetEntity="Ticket")
     * @ORM\JoinColumn(name="ticket_id", referencedColumnName="id", nullable=false)
     */
    private $attachmentTicket;

    /**
     * Get ticket
     *
     * @return Ticket
     */
    public function getTicket()
    {
        return $this->attachmentTicket;
    }

    /**
     * Add ticket
     *
     * @param Ticket $ticket
     */
    public function addTicket($ticket)
    {
        $this->attachmentTicket = $ticket;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set attachmentName
     *
     * @param string $attachmentName
     *
     * @return Attachment
     */
    public function setAttachmentName($attachmentName)
    {
        $this->attachmentName = $attachmentName;

        return $this;
    }

    /**
     * Get attachmentName
     *
     * @return string
     */
    public function getAttachmentName()
    {
        return $this->attachmentName;
    }

    /**
     * Set attachmentUploadDate
     *
     * @param \DateTime $attachmentUploadDate
     *
     * @return Attachment
     */
    public function setAttachmentUploadDate($attachmentUploadDate)
    {
        $this->attachmentUploadDate = $attachmentUploadDate;

        return $this;
    }

    /**
     * Get attachmentUploadDate
     *
     * @return \DateTime
     */
    public function getAttachmentUploadDate()
    {
        return $this->attachmentUploadDate;
    }

    /**
     * Set attachmentPath
     *
     * @param string $attachmentPath
     *
     * @return Attachment
     */
    public function setAttachmentPath($attachmentPath)
    {
        $this->attachmentPath = $attachmentPath;

        return $this;
    }

    /**
     * Get attachmentPath
     *
     * @return string
     */
    public function getAttachmentPath()
    {
        return $this->attachmentPath;
    }

    public function __toString() {
      return $this->attachmentName;
    }
}
