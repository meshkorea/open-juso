<?php
namespace Mesh\OpenJuso;

class Juso
{
    /**
     * @var string
     */
    private $roadAddr;
    /**
     * @var string
     */
    private $roadAddrPart1;
    /**
     * @var string
     */
    private $roadAddrPart2;
    /**
     * @var string
     */
    private $jibunAddr;
    /**
     * @var string
     */
    private $engAddr;
    /**
     * @var string
     */
    private $zipNo;
    /**
     * @var string
     */
    private $admCd;
    /**
     * @var string
     */
    private $rnMgtSn;
    /**
     * @var string
     */
    private $bdMgtSn;
    /**
     * @var string
     */
    private $detBdNmList;

    /**
     * Juso constructor.
     *
     * @param string $roadAddr 전체 도로명주소
     * @param string $roadAddrPart1 도로명주소
     * @param string $roadAddrPart2 도로명주소 상세
     * @param string $jibunAddr 지번
     * @param string $engAddr 도로명주소(영문)
     * @param string $zipNo 우편번호
     * @param string $admCd 행정구역코드
     * @param string $rnMgtSn 도로명코드
     * @param string $bdMgtSn 건물관리번호
     * @param string $detBdNmList 상세건물명
     */
    public function __construct(
        $roadAddr,
        $roadAddrPart1,
        $roadAddrPart2,
        $jibunAddr,
        $engAddr,
        $zipNo,
        $admCd,
        $rnMgtSn,
        $bdMgtSn,
        $detBdNmList
    )
    {
        $this->roadAddr = $roadAddr;
        $this->roadAddrPart1 = $roadAddrPart1;
        $this->roadAddrPart2 = $roadAddrPart2;
        $this->jibunAddr = $jibunAddr;
        $this->engAddr = $engAddr;
        $this->zipNo = $zipNo;
        $this->admCd = $admCd;
        $this->rnMgtSn = $rnMgtSn;
        $this->bdMgtSn = $bdMgtSn;
        $this->detBdNmList = $detBdNmList;
    }

    /**
     * @return string 전체 도로명주소
     */
    public function getRoadAddr()
    {
        return $this->roadAddr;
    }

    /**
     * @return string 도로명주소
     */
    public function getRoadAddrPart1()
    {
        return $this->roadAddrPart1;
    }

    /**
     * @return string 도로명주소 상세
     */
    public function getRoadAddrPart2()
    {
        return $this->roadAddrPart2;
    }

    /**
     * @return string 지번
     */
    public function getJibunAddr()
    {
        return $this->jibunAddr;
    }

    /**
     * @return string 도로명주소(영문)
     */
    public function getEngAddr()
    {
        return $this->engAddr;
    }

    /**
     * @return string 우편번호
     */
    public function getZipNo()
    {
        return $this->zipNo;
    }

    /**
     * @return string 행정구역코드
     */
    public function getAdmCd()
    {
        return $this->admCd;
    }

    /**
     * @return string 도로명코드
     */
    public function getRnMgtSn()
    {
        return $this->rnMgtSn;
    }

    /**
     * @return string 건물관리번호
     */
    public function getBdMgtSn()
    {
        return $this->bdMgtSn;
    }

    /**
     * @return string 상세건물명
     */
    public function getDetBdNmList()
    {
        return $this->detBdNmList;
    }

}